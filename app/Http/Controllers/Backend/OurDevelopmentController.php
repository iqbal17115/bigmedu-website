<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\OurDevelopment;
use App\Model\DevelopmentBackground;

class OurDevelopmentController extends Controller
{
    public function index()
    {
        $data['ourDevelopments'] = OurDevelopment::orderBy('sort_order','asc')->get();
        return view('backend.our_development.our_development-list')->with($data);
    }

    public function addOurDevelopment()
    {
        return view('backend.our_development.our_development-add');
    }

    public function storeOurDevelopment(Request $request)
    {
        $request->validate([
    		'title' => 'required',
    		'sort_order' => 'unique:our_developments',
        ]);
        
        $params = $request->all();

        if ($file = $request->file('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_development'), $filename);
            $params['image']= $filename;
        }

        OurDevelopment::create($params);
        
    	return redirect()->route('site-setting.our_development')->with('info','Our Development add Successfully.');
    }

    public function editOurDevelopment($id)
    {
        $data['editData'] = OurDevelopment::find($id);
    	return view('backend.our_development.our_development-add')->with($data);
    }

    public function updateOurDevelopment(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = OurDevelopment::find($id);
        $params = $request->all();
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/our_development/'.$data->image));
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_development'), $filename);
            $params['image']= $filename;
        }
    	$data->update($params);

    	return redirect()->route('site-setting.our_development')->with('info','Our Development Update Successfully');
    }

    public function deleteOurDevelopment(Request $request)
    {
        $data = OurDevelopment::find($request->id);
        @unlink(public_path('upload/our_development/'.$data->image));
    	$data->delete();
    }

    public function storeDevelopmentBackground(Request $request)
    {
        $request->validate([

        ]);

        $data = DevelopmentBackground::first();
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
        $params['show_section'] = $request->show_section ?? 0;
        if($file = $request->file('image'))
        {
            if(!empty($data))
            {
                @unlink(public_path('upload/our_development/'.$data->image));
            }
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_development'), $filename);
            $params['image']= $filename;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            DevelopmentBackground::create($params);
        }
        
        return redirect()->route('site-setting.our_development')->with('info','Updated successfully.');
    }

}
