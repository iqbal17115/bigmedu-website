@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')
@php
$urll = request()->fullUrl();
if($urll) {
    $url = explode('=',$urll);
    if(sizeOf($url) >= 3)
    {
        $ur = $url[2];
        $fmenu = DB::table('frontend_menus')->where('id', $ur)->first();
    }
}
//dd($fmenu);
@endphp
    <section id="teacher" style="@if(@$fmenu) margin-top:-5%; @else margin-top: 0; @endif">
        <div class="container">

            <div class="sixteen columns" id="left-content">
                <div id="printable_area"><h3>List of Employees</h3>
                <ul class="officer_category" style="margin-bottom: 12px;">
                <li style="margin-left:0" class="{{ !empty($active && $active == 1) ? 'active' : '' }}"><a href="{{ route('member_to_employee_frontend') }}">All</a></li>
                    <li style="margin-left:0" class="{{ !empty($active && $active == 2) ? 'active' : '' }}"><a href="{{ route('member_to_employee_frontend.bigm') }}">BIGM</a></li>
                    <li style="margin-left:0" class="{{ !empty($active && $active == 3) ? 'active' : '' }}"><a href="{{ route('member_to_employee_frontend.project') }}">Project</a></li>
                </ul>


                <div id="with-pic" style="display: block;">
                    <table class="bordered" id="categorized_list">
                        <tbody>
                            @foreach($all as $single)
                            <tr>
                                <td class="idHide">{{ $loop->iteration }}</td>
                                {{-- <script>
                                    function heightfind()
                                    {
                                      var clientWidth = document.getElementById('image_td').clientWidth;
                                      document.getElementById('image').width = clientWidth;
                                    }
                                  </script> --}}
                                <td id="image_td">
                                    <img id="image" {{-- onload="heightfind()" --}} src="{{ asset('public/upload/members/'.$single['member']->image) }}" style="height: 100px; width: 100%;">
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td width="50%">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td width="100">Name</td><td>{{ $single['member']->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100">Designation</td><td>{{ $single['member']->member_designation }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100">E-mail</td><td>{{ $single['member']->email }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td width="50%">
                                                    <table>
                                                        <tbody>
                                                            @if(@$single['member']->show_phone)
                                                            <tr>
                                                                <td width="100">Phone</td><td>{{ $single['member']->phone }}</td>
                                                            </tr>
                                                            @endif
                                                            <tr>
                                                                <td width="100">Ext No</td><td>{{ $single->ext_no }}</td>
                                                            </tr>
                                                            {{-- <tr>
                                                                <td width="100">Go to Profile</td><td class=""><a href="">Profile Overview</a></td>
                                                            </tr> --}}
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="">
                                    <a class="btn btn-primary" style="background: #8AC53C;margin-left: 10%;margin-top: 18%;" href="{{ route('member.profile', $single['member']->id ) }}">Profile Overview</a>
                                </td>
                            </tr>
                            <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            @php
            $lastMemberToEmployee = \App\Model\MemberToEmployee::with('member')->where('dept_or_project',1)->orderBy('id','DESC')->first();
            // dd($lastMemberToEmployee);
            @endphp
            @if(@$lastMemberToEmployee['updated_at'])
            <div style="margin-top: 2px;color: #070101;text-align: right;">
                Updated at {{date('d-M-Y',strtotime(@$lastMemberToEmployee['updated_at']))}}
                </div>
            </div>
            @endif
        </div>

        </div>
    </section>
@include('frontend.layouts.footer')

<style>
    /*! CSS Used from: /themes/responsive_npf/stylesheets/base.css ; media=all */
@media all{
ul{list-style:disc;}
table{border-collapse:collapse;border-spacing:0;}
table tr{line-height:2.1;}
h3{color:#181818;font-family:"Georgia", "Times New Roman", serif;font-weight:normal;}
h3{font-size:28px;line-height:34px;margin-bottom:8px;}
a,a:visited{color:#333;text-decoration:none;outline:0;}
a:hover,a:focus{color:#000;}
ul{margin-bottom:20px;}
ul{list-style:none;}
#left-content ul{list-style:disc;}
#left-content ul li{margin-left:20px;}
}
/*! CSS Used from: /themes/responsive_npf/templates/ministry/style.css ; media=all */
@media all{
#left-content table{width:100%;}
#left-content table thead tr{font-size:1.2em;padding:5px;}
.btn{background-image:linear-gradient(to bottom, #666, #a6a6a6);background-repeat:repeat-x;border-color:rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #a2a2a2;padding:0 5px;color:#fff;background-color:#a6a6a6;}
.btn:hover{color:#000!important;}
table.bordered > tbody > tr,table.bordered > thead > tr{border:1px #999 solid;}
table.bordered td,table.bordered th{padding-left:10px;vertical-align:top;line-height:1.2em;border:1px solid #999;}
table.bordered th{font-weight:bold;}
table.bordered table td:first-child{background-color:#eee;padding:5px;font-weight:bold;}
#printable_area > div{overflow:hidden;}
table{clear:both;}
td{box-sizing:border-box!important;padding:5px!important;border:1px solid #d8d8d8!important;}
td{vertical-align:top;}
@media screen and (max-width: 980px){
#left-content table{display:block;overflow-x:scroll;width:100%;}
}
a,a:visited{color:#666;text-decoration:none;}
a,a:visited{color:#666;text-decoration:none;}
#printable_area table{width:100%!important;}
}
/*! CSS Used from: /themes/responsive_npf/templates/ministry/responsive.css */
@media only screen and (min-width:320px ) and (max-width:979px){
#printable_area h3{font-size:14px!important;line-height:inherit!important;}
#printable_area div,td,th{font-size:12px!important;line-height:20px!important;}
#printable_area div{text-align:justify!important;}
#printable_area h3{margin-bottom:0;}
table{margin-bottom:20px;}
}
/*! CSS Used from: Embedded */
.officer_category{list-style:none;margin:0;padding:0;text-align:left;}
.officer_category li{display:inline-block;background:#eee;padding:5px 10px;margin-left:0!important;margin-right:10px!important;border-radius:5px;}
.officer_category li:hover{background:#9E5BBA;color:#fff!important;}
.officer_category li:hover a{color:#fff!important;}
.officer_category li a{color:#006699;font-size:18px;}
.officer_category li a:hover{text-decoration:none;}
.active{background:#9E5BBA!important;padding:5px 10px;color:white;}
.active a{color:#fff!important;}
</style>
@endsection