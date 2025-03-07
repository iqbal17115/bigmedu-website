{{-- @extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

<section id="teacher" style="padding-top: 60px;">
    <div class="container">
        @foreach($facultyTypes as $facultyType)
        @php
        $where = [];
        if(request()->course_info_id){
            $where[] = ['course_info_id','=',request()->course_info_id];
        }
        $facultyMembers = \App\Model\MemberToCourse::with('member')->where($where)->where('faculty_type_id',$facultyType->id)->orderBy('sort_order','ASC')->get();
        @endphp
        @if(count($facultyMembers) > 0)
        <div class="col-md-12">
            <div class="col-md-12" style="margin-top: 2px;">
                <div class="col-md-12">
                    <h4><b><u>{{ $facultyType->type }} List</u> </b></h4>
                </div>
                <div class="col-md-12 div-table-row">
                    <table style="border : 1px solid; background-color : #ffffff;">
                        <tbody><tr>
                            <th>Picture</th>
                            <th style="width: 30%;">Name</th>
                            <th style="width: 20%;">Designation</th>
                            <th style="width: 20%;">Work Place</th>
                            <th style="width: 80%;">Profile (Click to see)</th>
                        </tr>
                        @foreach($facultyMembers as $facultyMember)
                        <tr>
                            <td class="">
                                <img src="{{ asset('public/upload/members/'.$facultyMember->member->image) }}" alt="No image found" height="180px;" width="150px;">
                            </td>

                            <td class="">
                                {{ $facultyMember->member->name }}
                            </td>
                            <td class="">
                                {{ $facultyMember->member->member_designation }}
                            </td>
                            <td class="">
                                {{ $facultyMember->member->work_place }}
                            </td>
                            <td class="">
                                <a class="btn popovers" style="color: red" href="{{ route('member.profile', request()->all()+['id'=>$facultyMember->member->id]) }}">Profile Overview</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody></table>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
@include('frontend.layouts.footer')
<style>
    /*! CSS Used from: http://www.bigm.edu.bd/Content/css/style-flex.css */
    @media only screen and (min-width: 600px){
        a:hover,a:focus{color:#000;text-decoration:none;}
    }
    /*! CSS Used from: http://www.bigm.edu.bd/Content/css/myStyle.css */
    *{margin:0;padding:0;}
    table{border-collapse:collapse;}
    th,td{border:1px solid #c6c7cc;padding:10px 15px;}
    th{font-weight:bold;}
    th,td{border:1px solid #c6c7cc;padding:1px 15px;}
    th{font-weight:bold;}
</style>
<style>
    
</style>

@endsection --}}

@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

    <section id="teacher" style="margin-top:-7%;">
        <div class="container">

            <div class="sixteen columns" id="left-content">
                <div id="printable_area"><h3>Faculty List</h3>
                <ul class="officer_category" style="margin-bottom: 12px;">
                    <li style="margin-left:0" class="{{ !empty($active && $active == 'all') ? 'active' : '' }}"><a href="{{ route('faculty_members',request()->all()) }}">All</a></li>
                    {{-- <li style="margin-left:0" class="{{ !empty($active && $active == 2) ? 'active' : '' }}"><a href="{{ route('member_to_employee_frontend.bigm') }}">BIGM</a></li>
                    <li style="margin-left:0" class="{{ !empty($active && $active == 3) ? 'active' : '' }}"><a href="{{ route('member_to_employee_frontend.project') }}">Project</a></li> --}}
                    @php
                     $typesOfFaculty = \App\Model\FacultyType::all();
                    @endphp
                    @foreach($typesOfFaculty as $typeOfFaculty)
                    <li style="margin-left:0" class="{{ !empty($active && $active == $typeOfFaculty->id) ? 'active' : '' }}"><a href="{{ route('type_wise_faculty_members', request()->all()+['id'=>$typeOfFaculty->id]) }}">{{ $typeOfFaculty->type }}</a></li>
                    @endforeach

                </ul>

                @foreach($facultyTypes as $facultyType)
                @php
                $where = [];
                $course_info_id = @menuData(request()->menu_id)->course_info_id;
                if($course_info_id){
                    $where[] = ['course_info_id','=',$course_info_id];
                }
                $facultyMembers = \App\Model\MemberToCourse::with('member')->where($where)->where('faculty_type_id',$facultyType->id)->orderBy('sort_order','ASC')->get();
                @endphp
                @if(count($facultyMembers) > 0)
                <div class="col-md-12">
                    <h4><b><u>{{ $facultyType->type }} List</u> </b></h4>
                </div>
                <div id="with-pic" style="display: block;">
                    <table class="bordered" id="categorized_list">
                        <tbody>
                            @foreach($facultyMembers as $facultyMember)
                            <tr>
                                <td width="2%;" class="idHide">{{ $loop->iteration }}</td>
                                <td width="12%;"><img src="{{ asset('public/upload/members/'.$facultyMember['member']->image) }}" width="100" ></td>
                                <td width="40%;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td width="50%">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td width="100">Name</td><td>{{ $facultyMember['member']->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100">Designation</td><td>{{ $facultyMember['member']->member_designation }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100">Work Place</td><td>{{ $facultyMember['member']->work_place }}</td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="30%;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td width="50%">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td width="100">Phone</td><td>{{ $facultyMember['member']->phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100">E-mail</td><td>{{ $facultyMember['member']->email }}</td>
                                                            </tr>
                                                            @php
                                                                $memberToEmployee = App\Model\MemberToEmployee::where('member_id',$facultyMember['member']->id)->first();
                                                            @endphp
                                                            <tr>
                                                                <td width="100">Ext No</td><td>{{ !empty($memberToEmployee)?$memberToEmployee->ext_no : '' }}</td>
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
                                <td width="16%;" class="">
                                    <a class="btn btn-primary" style="background: #8AC53C;margin-left: 10%;margin-top: 18%;" href="{{ route('member.profile', $facultyMember['member']->id ) }}">Profile Overview</a>
                                </td>
                            </tr>
                            <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                @endforeach
            </div>
            <br>
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