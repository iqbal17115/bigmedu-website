<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Activity;
use Image;

class ActivityController extends Controller
{
    public function index()
    {
    	$data['activity'] = Activity::orderBy('date','desc')->get();
    	return view('backend.activity.activity-view')->with($data);

    }

    public function addActivity()
    {

    	return view('backend.activity.activity-add');
    }

    public function storeActivity(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'image' => 'required',
        ]);
       
       $params = $request->all();
       $params['date'] = date('Y-m-d',strtotime($request->date));
       $params['status'] = $request->status ?? 0;
       // dd($params);
       if ($file = $request->file('image'))
       {
        $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/activity'), $filename);
        $image=Image::make(public_path('upload/activity/').$filename);
        $image->resize(643,360)->save(public_path('upload/activity/').$filename);
        $params['image']= $filename;
    }
    Activity::create($params);

    return redirect()->back()->with('info', 'Activity store successfully.');
}

public function editActivity($id)
{
    $data['editData'] = Activity::find($id);
    return view('backend.activity.activity-add')->with($data);

}

public function updateActivity(Request $request,$id)
{
    	// dd($request->all());
    $request->validate([
        'title' => 'required',
        'date' => 'required',
        // 'image' => 'required',
    ]);
    $params = $request->all();
    $params['date'] = date('Y-m-d',strtotime($request->date));
    $params['status'] = $request->status ?? 0;
    $data = Activity::find($id);

    if ($file = $request->file('image'))
    {
        @unlink(public_path('upload/activity/'.$data->image));
        $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/activity'), $filename);
        $image=Image::make(public_path('upload/activity/').$filename);
        $image->resize(643,360)->save(public_path('upload/activity/').$filename);
        $params['image']= $filename;
    }
    $data->update($params);
    return redirect()->route('site-setting.activity')->with('info','Activity successfully.');

}

public function deleteActivity(Request $request)
{
    	// dd($id);
    $id = $request->id;
    $deleteData = Activity::find($id);
        // @unlink(public_path('upload/faculty/'.$deleteData->image));
    $deleteData->delete();
    return redirect()->route('site-setting.activity');
}
}
