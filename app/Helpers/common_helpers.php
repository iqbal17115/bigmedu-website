<?php

use App\Model\FrontendMenu;
use App\Model\Menu;
use App\Model\MenuPermission;
use Illuminate\Support\Str;

if ( !function_exists( 'menuUrl' ) ) {
    function menuUrl($menu) {
    	$route_url['menu'] = Str::slug(@$menu->url_link);
    	// if($menu->program_info_id && $menu->course_info_id){
    	// 	$route_url['program_info_id'] = $menu->program_info_id;
    	// 	$route_url['course_info_id'] = $menu->course_info_id;
    	// }
    	$route_url['menu_id'] = @$menu->id;

        return (@$menu->url_link)?(route('menu_url',$route_url)):'#' ;
    }
}

if ( !function_exists( 'menuData' ) ) {
    function menuData($menu_id) {
    	return FrontendMenu::find($menu_id);
    }
}

if ( !function_exists( 'AccessRole' ) ) {
    function AccessRole( $user_roles ) {
        $role = '';
        foreach ( $user_roles as $key => $user_role ) {
            if ( $key != 0 ) {
                $role .= ' , ';
            }
            $role .= "<span class='badge badge-success'>" . @$user_role['role_details']['name'] . "</span>";
        }

        return $role;

    }
}
if(!function_exists('inner_permission')){
	function inner_permission($permitted_route){
		if(Auth::user()->id=='1'){
			return true;
		}
		
		$user_role_array=Auth::user()->user_role;
		if(count($user_role_array)==0){
			$user_role = [];
		}else{
			foreach($user_role_array as $rolee){
				$user_role[] = $rolee->role_id;
			}
		}
		
		$existpermission = MenuPermission::where('permitted_route',$permitted_route)->whereIn('role_id',@$user_role)->first();
		if($existpermission){
			return true;
		}else{
			return false;
		}
	}
}
