<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Teacher;
use App\Model\Designation;
use Image;
use DB;

class TeacherController extends Controller
{
    //
    public function index()
    {
          session()->put('route', 'site-setting.teacher.information');
    	$data['teachers'] = Teacher::orderBy(DB::raw('ISNULL(serial),serial'),'asc')->get();
        // dd($data['teachers']->toArray());
    	return view('backend.teacher.teacher-view')->with($data);

    }

    public function addTeacher()
    {
        
        $data['designation'] = Designation::all();
    	return view('backend.teacher.teacher-add')->with($data);

    }

    public function storeTeacher(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'faculty_slug'     => 'required|unique:teachers',
            // 'image' => 'required',

        ]);
    	$data = new Teacher;
    	$params = $request->all();
        
    	 if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/faculty'), $filename);
            $image=Image::make(public_path('upload/faculty/').$filename);
            $image->resize(230,230)->save(public_path('upload/faculty/').$filename);
            $params['image']= $filename;
        }
    Teacher::create($params);

    	return redirect()->back()->with('info','Faculty store successfully.');
    }

    public function editTeacher($id)
    {
        $data['editData'] = Teacher::find($id);
        $data['designation'] = Designation::all();
        // dd($editData->toArray( ));
        return view('backend.teacher.teacher-add')->with($data);



    }

    public function updateTeacher(Request $request,$id)
    {
    	// dd($request->all());
        $request->validate([
            'name' => 'required',
            // 'faculty_slug'     => 'required|unique:teachers',
        ]);
        $params = $request->all();
        $data = Teacher::find($id);
        // dd($params);
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/faculty/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/faculty'), $filename);
            $image=Image::make(public_path('upload/faculty/').$filename);
            $image->resize(230,230)->save(public_path('upload/faculty/').$filename);
            $params['image']= $filename;
        }
        $data->update($params);
        return redirect()->route('site-setting.teacher.information')->with('info','Faculty update successfully.');

    }

    public function deleteTeacher(Request $request)
    {
    	// dd($id);
        $id = $request->id;
        $deleteData = Teacher::find($id);
        // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('site-setting.teacher.information');
    }


}
