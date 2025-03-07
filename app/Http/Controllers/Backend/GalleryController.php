<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Gallery;
use Image;

class GalleryController extends Controller
{
    //
    public function index()
    {
    	$data['gallery'] = Gallery::all();
    	return view('backend.gallery.gallery-view')->with($data);

    }

    public function addGallery()
    {
    	return view('backend.gallery.gallery-add');

    }

    public function storeGallery(Request $request)
    {
        
    	// $data = new Gallery;
        $request->validate([
            // 'title' => 'required',
            // 'description' => 'required',
            'image' => 'required',

        ]);
        $params = $request->all();
    	 if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/gallery'), $filename);
            $image=Image::make(public_path('upload/gallery/').$filename);
            $image->resize(1700,1100)->save(public_path('upload/gallery/').$filename);
            $params['image']= $filename;
            
        }

        Gallery::create($params);
        return redirect()->back()->with('info','Gallery store successfully.');
        
    }

    public function editGallery($id)
    {
        $data['editData'] = Gallery::find($id);
        // dd($editData->toArray( ));
        return view('backend.gallery.gallery-add')->with($data);
    }

    public function updateGallery(Request $request,$id)
    {
    	// dd($request->all());
        $params = $request->all();
        $data = Gallery::find($id);

        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/gallery/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/gallery'), $filename);
            $image=Image::make(public_path('upload/gallery/').$filename);
            $image->resize(1700,1100)->save(public_path('upload/gallery/').$filename);
            $params['image']= $filename;    
        }
        $data->update($params);
        return redirect()->route('site-setting.gallery')->with('info','Gallery update successfully.');
    }

    public function deleteGallery(Request $request)
    {
    	// dd($id);
        $id = $request->id;
        $deleteData = Gallery::find($id);
        // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('site-setting.gallery');
    }
}
