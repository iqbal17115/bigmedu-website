<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\InstituteDetail;

class InstituteDetailsController extends Controller
{
    public function index()
    {
        $data['editData'] = InstituteDetail::first();
        return view('backend.institute_details.institute_details-add')->with($data);
    }

    public function store(Request $request)
    {
        $data = InstituteDetail::first();
        $params = $request->all();
        if(!empty($data))
        {
            if ($file = $request->file('image'))
            {
                @unlink(public_path('upload/institute_details/'.$data->image));
                $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/institute_details/'), $filename);
                $params['image']= $filename;
                
            }
            $data->update($params);
            return redirect()->route('site-setting.institute_details')->with('info','Institute Setting Update Successfully.');
        }
        else
        {
            if ($file = $request->file('image'))
            {
                $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/institute_details/'), $filename);
                $params['image']= $filename;
            }
            InstituteDetail::create($params);
            return redirect()->route('site-setting.institute_details')->with('info','Institute Setting Add Successfully.');
        }
    }
}
