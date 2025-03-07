<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MemberToEmployee;
use App\Model\Member;
use App\Model\Department;
use App\Model\Project;

class MemberToEmployeeController extends Controller
{
    //
    public function frontendAll()
    {
        $data['active'] = 1;
        $data['all'] = MemberToEmployee::with('member')->orderBy('sort_order','ASC')->get();
        $data['allBIGM'] = MemberToEmployee::with('member')->where('dept_or_project',1)->orderBy('sort_order','ASC')->get();
        //$data['allProject'] = MemberToEmployee::with('member')->where('dept_or_project',2)->orderBy('sort_order','ASC')->get();
        $data['last_created_date'] = MemberToEmployee::latest()->first()->created_at;
        return view('frontend.all-member-to-employee-all_type')->with($data);
    }
    public function frontendFilterBigm()
    {
        $data['active'] = 2;
        $data['all'] = MemberToEmployee::with('member')->where('dept_or_project',1)->orderBy('sort_order','ASC')->get();
        $data['last_created_date'] = MemberToEmployee::latest()->first()->created_at;
        return view('frontend.all-member-to-employee_bigm')->with($data);
    }
    public function frontendFilterProject()
    {
        $data['active'] = 3;
        $data['all'] = MemberToEmployee::with('member')->where('dept_or_project',2)->orderBy('sort_order','ASC')->get();
        $data['last_created_date'] = MemberToEmployee::latest()->first()->created_at;
        return view('frontend.all-member-to-employee_project')->with($data);
    }

    public function list()
    {
    	// dd('test');
    	$data['memberToEmployees'] = MemberToEmployee::with('member')->orderBy('sort_order')->get();
        // return response()->json($data);
    	return view('backend.member_to_employee.member_to_employee-list')->with($data);
    }

    public function add()
    {
		$data['editData'] = NULL;
        $data['members'] = Member::all();
        $data['departments'] = Department::all();
        $data['projects'] = Project::all();
    	return view('backend.member_to_employee.member_to_employee-add')->with($data);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'member_id' => 'required',
    		'dept_or_project' => 'required',
        ]);
        
        $params = $request->all();

        if($request->dept_or_project == 1)
        {
            $params['project_id'] = NULL;
        }
        else if($request->dept_or_project == 2)
        {
            $params['dept_id'] = NULL;
        }

        MemberToEmployee::create($params);
        
    	return redirect()->route('member_to_employee.list')->with('info','Member To Employee add Successfully.');


    }

    public function edit($id)
    {
        $data['members'] = Member::all();
        $data['editData'] = MemberToEmployee::find($id);
        // dd($data['editData']);
        $data['departments'] = Department::all();
        $data['projects'] = Project::all();
    	return view('backend.member_to_employee.member_to_employee-add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required',
            'dept_or_project' => 'required',

        ]);
    	$data = MemberToEmployee::find($id);
    	$params = $request->all();
    	$data->update($params);

    	return redirect()->route('member_to_employee.list')->with('info','Member To Employee Update Successfully');

    }

    public function destroy(Request $request)
    {
    	$data = MemberToEmployee::find($request->id);
    	$data->delete();
    	
    }

}
