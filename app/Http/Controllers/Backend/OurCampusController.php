<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\OurCampus;
use App\Model\CampusBackground;

class OurCampusController extends Controller
{
    public function index()
    {
        $data['ourCampuses'] = OurCampus::orderBy('sort_order','asc')->get();
        return view('backend.our_campus.our_campus-list')->with($data);
    }

    public function addOurCampus()
    {
        return view('backend.our_campus.our_campus-add');
    }

    public function storeOurCampus(Request $request)
    {
        $request->validate([
    		'sort_order' => 'unique:our_campuses',
        ]);
        
        $params = $request->all();

        if ($file = $request->file('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_campus'), $filename);
            $params['image']= $filename;
        }

        OurCampus::create($params);
        
    	return redirect()->route('site-setting.our_campus')->with('info','Our Campus add Successfully.');
    }

    public function editOurCampus($id)
    {
        $data['editData'] = OurCampus::find($id);
    	return view('backend.our_campus.our_campus-add')->with($data);
    }

    public function updateOurCampus(Request $request, $id)
    {
        $request->validate([
            
        ]);
    	$data = OurCampus::find($id);
        $params = $request->all();
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/our_campus/'.$data->image));
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_campus'), $filename);
            $params['image']= $filename;
        }
    	$data->update($params);

    	return redirect()->route('site-setting.our_campus')->with('info','Our Campus Update Successfully');
    }

    public function deleteOurCampus(Request $request)
    {
        $data = OurCampus::find($request->id);
        @unlink(public_path('upload/our_campus/'.$data->image));
    	$data->delete();
    }

    public function storeCampusBackground(Request $request)
    {
        $request->validate([

        ]);

        $data = CampusBackground::first();
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
        $params['show_section'] = $request->show_section ?? 0;
        if($file = $request->file('image'))
        {
            if(!empty($data))
            {
                @unlink(public_path('upload/our_campus/'.$data->image));
            }
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_campus'), $filename);
            $params['image']= $filename;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            CampusBackground::create($params);
        }
        
        return redirect()->route('site-setting.our_campus')->with('info','Updated successfully.');
    }

}
