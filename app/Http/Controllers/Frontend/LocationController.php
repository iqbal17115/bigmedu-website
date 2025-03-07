<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Location;

class LocationController extends Controller
{
    public function location()
    {
        $data['location'] = Location::first();
        return view('frontend.location')->with($data);
    }

    public function index()
    {
        $data['location'] = Location::first();
        //dd($data['location']);
        return view('backend.location.location-list')->with($data);
    }

    public function addLocation()
    {
    	return view('backend.location.location-add');
    }

    public function storeLocation(Request $request)
    {
    	$request->validate([
    		// 'title' => 'required',
    		// 'short_description' => 'required',
    		// 'long_description' => 'required',
    		// 'image' => 'required',

    	]);
    	$params = $request->all();
    	// if($request->image)
    	// {
    	// 	$imageName = time().'.'.$request->image->getClientOriginalExtension();
    	// 	$request->image->move(public_path('upload/Location'), $imageName);
    	// 	$params['image'] = $imageName;
    	// }
    	Location::create($params);
    	return redirect()->route('top-menu.location_admin')->with('info','New Location add Successfully.');


    }

    public function editLocation($id)
    {
    	$data['editData'] = Location::find($id);
    	return view('backend.location.location-add')->with($data);
    }

    public function updateLocation(Request $request, $id)
    {
        $request->validate([
            // 'title' => 'required',
            // 'short_description' => 'required',
            // 'long_description' => 'required',
            // 'image' => 'required',

        ]);
    	$data = Location::find($id);
    	$params = $request->all();
    	// if($request->image)
    	// {
    	// 	@unlink(public_path('upload/Location/'.$data->image));
    	// 	$imageName = time().'.'.$request->image->getClientOriginalExtension();
    	// 	$request->image->move(public_path('upload/Location'), $imageName);
    	// 	$params['image'] = $imageName;
    	// }
    	$data->update($params);

    	return redirect()->route('top-menu.location_admin')->with('info','Location Update Successfully');

    }

    public function deleteLocation(Request $request)
    {
    	$data = Location::find($request->id);
    	$data->delete();
    	
    }
}
