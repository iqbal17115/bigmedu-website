<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $data['departments'] = Department::all();
        return view('backend.department.department-list')->with($data);
    }

    public function addDepartment()
    {
        return view('backend.department.department-add');
    }

    public function storeDepartment(Request $request)
    {
        $request->validate([
    		'dept_name' => 'required',
        ]);
        
        $params = $request->all();

        Department::create($params);
        
    	return redirect()->route('user.department')->with('info','New Department add Successfully.');
    }

    public function editDepartment($id)
    {
        $data['editData'] = Department::find($id);
    	return view('backend.department.department-add')->with($data);
    }

    public function updateDepartment(Request $request, $id)
    {
        $request->validate([
            'dept_name' => 'required',
        ]);
    	$data = Department::find($id);
        $params = $request->all();
    	$data->update($params);

    	return redirect()->route('user.department')->with('info','Department Update Successfully');
    }

    public function deleteDepartment(Request $request)
    {
        $data = Department::find($request->id);
    	$data->delete();
    }

}
