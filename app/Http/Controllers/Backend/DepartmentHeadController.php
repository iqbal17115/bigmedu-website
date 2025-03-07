<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DepartmentHead;
use App\Model\Teacher;
use Image;

class DepartmentHeadController extends Controller
{
    public function index()
    {
        session()->forget('route');
    	$data['head'] = DepartmentHead::first();
    	// dd($data['head']->toArray());
    	return view('backend.department_head.department-head-view')->with($data);

    }

    public function addHead()
    {
        
    	return view('backend.department_head.department-head-add');
    }

    public function storeHead(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            // 'image' => 'required',

        ]);
    	$data = new DepartmentHead;
    	$params = $request->all();
    	 if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/faculty'), $filename);
            $image=Image::make(public_path('upload/faculty/').$filename);
            $image->resize(230,230)->save(public_path('upload/faculty/').$filename);
            $params['image']= $filename;
        }
    DepartmentHead::create($params);

    	return redirect()->back()->with('info','Faculty store successfully.');
    }

    public function editHead($id)
    {
        // $value = session()->get('route');
        // dd($value);
        $data['editData'] = DepartmentHead::find($id);
        return view('backend.department_head.department-head-add')->with($data);

    }

    public function updateHead(Request $request,$id)
    {
    	// dd($request->all());
         $request->validate([
            'name' => 'required',
            'designation' => 'required',
            // 'image' => 'required',

        ]);
        $params = $request->all();
        $department = DepartmentHead::where('id',1)->first();
        $teacher = Teacher::where('id',1)->first();
        // dd($department->toArray());
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/faculty/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/faculty'), $filename);
            $image=Image::make(public_path('upload/faculty/').$filename);
            $image->resize(230,230)->save(public_path('upload/faculty/').$filename);
            $params['image']= $filename;
        }
        $department->update($params);
        $teacher->update($params);
        if(session()->has('route'))
        {
            $route = session()->get('route');
            session()->forget('route');
            return redirect()->route($route)->with('info','Department Head update successfully.');
        }
        return redirect()->route('site-setting.department.head.information')->with('info','Faculty update successfully.');

    }

    public function deleteHead(Request $request)
    {
    	// dd($id);
        $id = $request->id;
        $deleteData = DepartmentHead::find($id);
        // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('site-setting.teacher.information');
    }
}
