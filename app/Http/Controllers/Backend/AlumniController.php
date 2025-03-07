<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Alumni;
use App\Model\AlumniBackground;
use Image;

class AlumniController extends Controller
{
    public function index()
    {
        $data['alumnies'] = Alumni::all();
        return view('backend.alumni.alumni-list')->with($data);
    }

    public function addAlumni()
    {
        return view('backend.alumni.alumni-add');
    }

    public function storeAlumni(Request $request)
    {
        $request->validate([
    		'title' => 'required',
        ]);
        
        $params = $request->all();

        if ($file = $request->file('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/alumni'), $filename);
            $image=Image::make(public_path('upload/alumni/').$filename);
            //$image->resize(643,360)->save(public_path('upload/activity/').$filename);
            $image->save(public_path('upload/alumni/').$filename);
            $params['image']= $filename;
        }

        Alumni::create($params);
        
    	return redirect()->route('site-setting.alumni')->with('info','New Alumni add Successfully.');
    }

    public function editAlumni($id)
    {
        $data['editData'] = Alumni::find($id);
    	return view('backend.alumni.alumni-add')->with($data);
    }

    public function updateAlumni(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = Alumni::find($id);
        $params = $request->all();
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/alumni/'.$data->image));
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/alumni'), $filename);
            $image=Image::make(public_path('upload/alumni/').$filename);
            //$image->resize(643,360)->save(public_path('upload/activity/').$filename);
            $image->save(public_path('upload/alumni/').$filename);
            $params['image']= $filename;
        }
    	$data->update($params);

    	return redirect()->route('site-setting.alumni')->with('info','Alumni Update Successfully');
    }

    public function deleteAlumni(Request $request)
    {
        $data = Alumni::find($request->id);
        @unlink(public_path('upload/alumni/'.$data->image));
    	$data->delete();
    }

    public function storeAlumniBackground(Request $request)
    {
        $request->validate([

        ]);

        $data = AlumniBackground::first();
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
        $params['show_section'] = $request->show_section ?? 0;
        if($file = $request->file('image'))
        {
            if(!empty($data))
            {
                @unlink(public_path('upload/alumni/'.$data->image));
            }
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/alumni'), $filename);
            $params['image']= $filename;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            AlumniBackground::create($params);
        }
        
        return redirect()->route('site-setting.alumni')->with('info','Updated successfully.');
    }

}
