<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ContactUs;

class ContactUsController extends Controller
{
     public function index()
    {
    	// dd('test');
    	$data['contact'] = ContactUs::all();
    	return view('backend.contact.contact-view')->with($data);
    }

    public function addContactUs()
    {
    	return view('backend.contact.contact-add');
    }

    public function storeContactUs(Request $request)
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
    	// 	$request->image->move(public_path('upload/ContactUs'), $imageName);
    	// 	$params['image'] = $imageName;
    	// }
    	ContactUs::create($params);
    	return redirect()->route('frontend-menu.contact.us')->with('info','New ContactUs add Successfully.');


    }

    public function editContactUs($id)
    {
    	$data['editData'] = ContactUs::find($id);
    	return view('backend.contact.contact-add')->with($data);
    }

    public function updateContactUs(Request $request, $id)
    {
        $request->validate([
            // 'title' => 'required',
            // 'short_description' => 'required',
            // 'long_description' => 'required',
            // 'image' => 'required',

        ]);
    	$data = ContactUs::find($id);
    	$params = $request->all();
    	// if($request->image)
    	// {
    	// 	@unlink(public_path('upload/ContactUs/'.$data->image));
    	// 	$imageName = time().'.'.$request->image->getClientOriginalExtension();
    	// 	$request->image->move(public_path('upload/ContactUs'), $imageName);
    	// 	$params['image'] = $imageName;
    	// }
    	$data->update($params);

    	return redirect()->route('site-setting.contact.us')->with('info','ContactUs Update Successfully');

    }

    public function deleteContactUs(Request $request)
    {
    	$data = ContactUs::find($request->id);
    	$data->delete();
    	
    }
}
