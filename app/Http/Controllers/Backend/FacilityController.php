<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Facility;

class FacilityController extends Controller
{
    //
    public function index()
    {
    	// dd('test');
    	$data['facility'] = Facility::orderBy('sort_order','asc')->get();
        // return response()->json($data);
    	return view('backend.facility.facility-view')->with($data);
    }

    public function addFacility()
    {
    	return view('backend.facility.facility-add');
    }

    public function storeFacility(Request $request)
    {
    	$request->validate([
    		'title' => 'required',
    		// 'short_description' => 'required',
    		'image' => 'required',

    	]);
    	$params = $request->all();
    	if($request->image)
    	{
    		$imageName = time().'.'.$request->image->getClientOriginalExtension();
    		$request->image->move(public_path('upload/facility'), $imageName);
    		$params['image'] = $imageName;
    	}
    	Facility::create($params);
    	return redirect()->route('site-setting.facility')->with('info','New facility Upload Successfully.');


    }

    public function editFacility($id)
    {
    	$data['editData'] = Facility::find($id);
    	return view('backend.facility.facility-add')->with($data);
    }

    public function updateFacility(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'short_description' => 'required',
            // 'image' => 'required',

        ]);
    	$data = Facility::find($id);
    	$params = $request->all();
    	if($request->image)
    	{
    		@unlink(public_path('upload/facility/'.$data->image));
    		$imageName = time().'.'.$request->image->getClientOriginalExtension();
    		$request->image->move(public_path('upload/facility'), $imageName);
    		$params['image'] = $imageName;
    	}
    	$data->update($params);

    	return redirect()->route('site-setting.facility')->with('info','facility Update Successfully');

    }

    public function deleteFacility(Request $request)
    {
    	$data = Facility::find($request->id);
    	$data->delete();
    	
    }

}
