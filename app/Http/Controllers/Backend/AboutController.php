<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\About;

class AboutController extends Controller
{
    //
    public function index()
    {
    	// dd('test');
    	$data['about'] = About::all();
        // return response()->json($data);
    	return view('backend.about.about-view')->with($data);
    }

    public function addAbout()
    {
    	return view('backend.about.about-add');
    }

    public function storeAbout(Request $request)
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
    		$request->image->move(public_path('upload/about'), $imageName);
    		$params['image'] = $imageName;
    	}
    	About::create($params);
    	return redirect()->route('site-setting.about')->with('info','New about Upload Successfully.');


    }

    public function editAbout($id)
    {
    	$data['editData'] = About::find($id);
    	return view('backend.about.about-add')->with($data);
    }

    public function updateAbout(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            // 'image' => 'required',

        ]);
    	$data = About::find($id);
    	$params = $request->all();
    	if($request->image)
    	{
    		@unlink(public_path('upload/about/'.$data->image));
    		$imageName = time().'.'.$request->image->getClientOriginalExtension();
    		$request->image->move(public_path('upload/about'), $imageName);
    		$params['image'] = $imageName;
    	}
    	$data->update($params);

    	return redirect()->route('site-setting.about')->with('info','about Update Successfully');

    }

    public function deleteAbout(Request $request)
    {
    	$data = About::find($request->id);
    	$data->delete();
    	
    }

}
