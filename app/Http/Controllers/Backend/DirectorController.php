<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Director;

class DirectorController extends Controller
{
    //
    public function index()
    {
    	// dd('test');
    	$data['director'] = Director::all();
        // return response()->json($data);
    	return view('backend.director.director-view')->with($data);
    }

    public function addDirector()
    {
    	return view('backend.director.director-add');
    }

    public function storeDirector(Request $request)
    {
    	$request->validate([
    		'title' => 'required',
    		'short_description' => 'required',
    		'image' => 'required',

    	]);
    	$params = $request->all();
    	if($request->image)
    	{
    		$imageName = time().'.'.$request->image->getClientOriginalExtension();
    		$request->image->move(public_path('upload/director'), $imageName);
    		$params['image'] = $imageName;
    	}
    	Director::create($params);
    	return redirect()->route('site-setting.director')->with('info','New director Upload Successfully.');


    }

    public function editDirector($id)
    {
    	$data['editData'] = Director::find($id);
    	return view('backend.director.director-add')->with($data);
    }

    public function updateDirector(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            // 'image' => 'required',

        ]);
    	$data = Director::find($id);
    	$params = $request->all();
    	if($request->image)
    	{
    		@unlink(public_path('upload/director/'.$data->image));
    		$imageName = time().'.'.$request->image->getClientOriginalExtension();
    		$request->image->move(public_path('upload/director'), $imageName);
    		$params['image'] = $imageName;
    	}
    	$data->update($params);

    	return redirect()->route('site-setting.director')->with('info','director Update Successfully');

    }

    public function deleteDirector(Request $request)
    {
    	$data = Director::find($request->id);
    	$data->delete();
    	
    }

}
