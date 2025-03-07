<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MemberToCourse;
use App\Model\Member;
use App\Model\CourseInfo;
use App\Model\FacultyType;

class MemberToCourseController extends Controller
{
    public function frontend()
    {
        $data['all'] = GoverningBody::with('member')->orderBy('sort_order','ASC')->get();
        //dd($data['trustees']);
        return view('backend.governing_body.governing_body-list')->with($data);
    }

    public function facultyMembers()
    {
        $data['active'] = 'all';
        $data['facultyTypes'] = FacultyType::orderBy('sort_order')->get();
        //$data['facultyMembers'] = MemberToCourse::with('member','faculty_type')->orderBy('faculty_type_id','ASC')->orderBy('sort_order','ASC')->get();
            //dd($data['memberToCourses']);

		return view('frontend.faculty-members')->with($data);
    }

    public function facultyMembersTypewise($id)
    {
        $data['active'] = $id;
        $data['facultyTypes'] = FacultyType::where('id',$id)->orderBy('sort_order')->get();

		return view('frontend.faculty-members')->with($data);
    }

    public function programWiseCourse(Request $request)
    {
        $programWiseCourses = CourseInfo::where('program_info_id',$request->program_info_id)->get();

        if(isset($programWiseCourses))
		{
			return response()->json($programWiseCourses);
		}
		else
		{
			return response()->json('fail');
		}
    }

    public function list(Request $request)
    {
        //dd($data['memberToCourses']);
        $data['memberToCourses'] =[];
        $data['program_info_id'] = $request->program_info_id;
        $data['course_info_id'] = $request->course_info_id;
        if(empty($data['course_info_id']))
        {
            $data['program_info_id'] = "";
        }
        if($request->course_info_id){
            $data['memberToCourses'] =[];
            $data['memberToCourses'] = MemberToCourse::with('member','faculty_type')->where('course_info_id',$request->course_info_id)->orderBy('faculty_type_id','ASC')->orderBy('sort_order','ASC')->get();
            //dd($data['memberToCourses']);

			return view('backend.member_to_course.member_to_course-list')->with($data);
		}else{
			return view('backend.member_to_course.member_to_course-list')->with($data);
		}
    }

    public function add()
    {
        $data['editData'] = NULL;
        $data['members'] = Member::all();
        return view('backend.member_to_course.member_to_course-add')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_info_id' => 'required',
            'course_info_id' => 'required',
            'faculty_type_id' => 'required',
            'member_id' => 'required',
        ]);
        
        $params = $request->all();

        $member = MemberToCourse::create($params);
        
    	return redirect()->route('member_to_course.list')->with('info','Member to Course Information add Successfully.');
    }

    public function edit($id)
    {
        $data['members'] = Member::all();
        $data['editData'] = MemberToCourse::with('course_info')->find($id);
    	return view('backend.member_to_course.member_to_course-add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'program_info_id' => 'required',
            'course_info_id' => 'required',
            'faculty_type_id' => 'required',
            'member_id' => 'required',
        ]);

    	$data = MemberToCourse::find($id);
        $params = $request->except(['_token']);
        $data->update($params);

    	return redirect()->route('member_to_course.list')->with('info','Member to Course Information update Successfully.');
    }

    public function destroy(Request $request)
    {
        $data = MemberToCourse::find($request->id);
    	$data->delete();
    }
}
