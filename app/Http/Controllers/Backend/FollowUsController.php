<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FollowUs;

class FollowUsController extends Controller
{
    //
    public function index()
    {
    	$data['follow'] = FollowUs::first();
    	// dd($data['follow']);

    	return view('backend.follow_us.follow-us-view')->with($data);

    }

    public function addFollowUs()
    {

    	return view('backend.follow_us.follow-us-add');
    }

    public function storeFollowUs(Request $request)
    {
        // dd($request->all());
    	$data = new FollowUs;
    	$params = $request->all();
    	FollowUs::create($params);
    	return redirect()->route('site-setting.follow.us')->with('info', 'Follow Us store successfully.');
    }

    public function editFollowUs($id)
    {
        $data['editData'] = FollowUs::find($id);
        return view('backend.follow_us.follow-us-add')->with($data);

    }

    public function updateFollowUs(Request $request,$id)
    {
    	// dd($request->all());
        // $request->validate([
        //     'facebook_url' => 'required',
        // ]);
        $params = $request->all();
        $data = FollowUs::find($id);
        $data->update($params);
        return redirect()->route('site-setting.follow.us')->with('info','Follow Us update successfully.');

    }

    public function deleteFollowUs(Request $request)
    {
    	// dd($id);
        $id = $request->id;
        $deleteData = FollowUs::find($id);
        // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('site-setting.follow.us');
    }
}
