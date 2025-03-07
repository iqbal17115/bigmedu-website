@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
$user_role_array = Auth::user()->user_role;
if (count($user_role_array) == 0) {
    $user_role = [];
} else {
    foreach ($user_role_array as $rolee) {
        $user_role[] = $rolee->role_id;
    }
}
$parentroutearray = explode('.',$route);
$parentroute = $parentroutearray[0];
$childroute = $parentroute.'.'.@$parentroutearray[1];
$nav_menu=[];
@endphp

@if (in_array(1, $user_role))
@php           
$grand_parents = App\Model\Menu::where('parent', 0)->where('status',1)->orderBy('sort', 'asc')->get();
foreach ($grand_parents as  $grand_parent){ 
  $nav_menu[$grand_parent->id]['grand_parent']=$grand_parent->name;
  $nav_menu[$grand_parent->id]['grand_parent_route']=$grand_parent->route;            
  $nav_menu[$grand_parent->id]['grand_parent_icon']=$grand_parent->icon;       
  $parents=App\Model\Menu::where('parent', $grand_parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
  foreach($parents as $parent){
    $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_id']=$parent->id;
    $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_name']=$parent->name;
    $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_route']=$parent->route;
    $childs=App\Model\Menu::where('parent', $parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
    foreach($childs as $child){                               
      $nav_menu[$grand_parent->id]['is_child']='yes';
      $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_id']=$child->id;
      $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_name']=$child->name;
      $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_route']=$child->route;            
    }
  }
}       
@endphp 
@else
@php
$grand_parents = App\Model\Menu::where('parent', 0)->where('status',1)->where('id','!=',1)->orderBy('sort', 'asc')->get();
foreach ($grand_parents as  $grand_parent){        
  $parents=App\Model\Menu::where('parent', $grand_parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
  foreach($parents as $parent){ 
    $check_parent=App\Model\MenuPermission::where('menu_id',$parent->id)->whereIn('role_id',@$user_role)->first();
    if($check_parent){           
      $permission=App\Model\MenuPermission::where('permitted_route',$parent->route)->whereIn('role_id', @$user_role)->first();
      if($permission){
        $nav_menu[$grand_parent->id]['grand_parent']=$grand_parent->name;
        $nav_menu[$grand_parent->id]['grand_parent_route']=$grand_parent->route;            
        $nav_menu[$grand_parent->id]['grand_parent_icon']=$grand_parent->icon;
        $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_id']=$parent->id;
        $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_name']=$parent->name;
        $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_route']=$parent->route;
      }            
    }     

    $childs=App\Model\Menu::where('parent', $parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
    if(count($childs)>0){                      
      foreach($childs as $child){
        $permission=App\Model\MenuPermission::where('permitted_route',$child->route)->whereIn('role_id', @$user_role)->first(); 
        if($permission){ 
          $nav_menu[$grand_parent->id]['is_child']='yes';
          $nav_menu[$grand_parent->id]['grand_parent']=$grand_parent->name;
          $nav_menu[$grand_parent->id]['grand_parent_route']=$grand_parent->route;
          $nav_menu[$grand_parent->id]['grand_parent_icon']=$grand_parent->icon;
          $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_name']=$parent->name;
          $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_route']=$parent->route;              
          $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_id']=$child->id;
          $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_name']=$child->name;
          $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_route']=$child->route;
        }
      }
    }
  }                  
}
@endphp
@endif

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{route('dashboard')}}" class="brand-link">
    <img src="{{asset('public/backend/img/AdminLTELogo.png')}}" alt="Admin Dashboard" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">

          @if(@auth()->user()->image)
          <img src="{{asset('public/backend/images/user_images/'.auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{asset('public/backend/images/noimage.png')}}" class="img-circle elevation-2" alt="User Image">
          @endif
      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link {{$route == 'dashboard'?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        {{-- @if(!empty(auth()->user()->member_id))
        <li class="nav-item">
          <a href="{{ route('member_management.edit',\Crypt::encrypt(auth()->user()->member_id)) }}" class="nav-link {{$route == 'member_management.edit'?'active':''}}">
            <i class="nav-icon far fa-circle"></i>
            <p>Change Information</p>
          </a>
        </li>
        @endif --}}
        @foreach($nav_menu as $grand_menu)
        <li class="nav-item has-treeview {{$parentroute==$grand_menu['grand_parent_route'] ? 'menu-open' :''}}">
          <a href="#" class="nav-link {{$parentroute==$grand_menu['grand_parent_route'] ? 'active' :''}}">
            <i class="nav-icon {{$grand_menu['grand_parent_icon'] ? $grand_menu['grand_parent_icon'] :'fas fa-tools'}}"></i>
            <p>
              {{$grand_menu['grand_parent']}}
              <i class="fas fa-angle-left right"></i>                
            </p>
          </a>
          <ul class="nav nav-treeview" style="{{$parentroute==$grand_menu['grand_parent_route'] ? 'display:block' :'display:none'}}">
            @foreach($grand_menu['parent'] as $parent_menu) 
            @if(!empty($parent_menu['child']))
            @else
            <li class="nav-item">
              <a href="{{route($parent_menu['parent_route'])}}" class="nav-link {{$route==$parent_menu['parent_route'] ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{$parent_menu['parent_name']}}</p>
              </a>
            </li>
            @endif      
            @endforeach 
          </ul>
        </li>
        @endforeach         
      </ul>
    </nav>
  </div>
</aside>

{{-- <script>
    $('.has-treeview').click(function(){
      $(this).siblings().find('ul').slideUp();
      $(this).siblings().removeClass('menu-open');
      $(this).find('ul').slideToggle();
      console.log('clicked');
  });
</script> --}}






