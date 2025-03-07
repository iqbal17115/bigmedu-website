<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use Image;

class BannerController extends Controller
{
    public function index()
    {
    	$data['banner'] = Banner::all();
    	return view('backend.banner.banner-view')->with($data);

    }

    public function addBanner()
    {
    	return view('backend.banner.banner-add');

    }

    public function storeBanner(Request $request)
    {
        
    	// $data = new banner;
         $request->validate([
            // 'name' => 'required',
            // 'designation_id' => 'required',
            'image' => 'required',
        ]);
        $params = $request->all();
    	 if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/banner'), $filename);
            $image=Image::make(public_path('upload/banner/').$filename);
            $image->resize(1900,1051)->save(public_path('upload/banner/').$filename);
            $params['image']= $filename;
            
        }

        Banner::create($params);
        return redirect()->back()->with('info','banner store successfully.');
        
    }

    public function editBanner($id)
    {
        $data['editData'] = Banner::find($id);
        // dd($editData->toArray( ));
        return view('backend.banner.banner-add')->with($data);



    }

    public function updateBanner(Request $request,$id)
    {
    	// dd($request->all());
                 $request->validate([
            // 'name' => 'required',
            // 'designation_id' => 'required',
            // 'image' => 'required',
        ]);
        $params = $request->all();
        $data = Banner::find($id);

        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/banner/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/banner'), $filename);
            $image=Image::make(public_path('upload/banner/').$filename);
            $image->resize(1900,1051)->save(public_path('upload/banner/').$filename);
            $params['image']= $filename;
            
        }
        $data->update($params);
        return redirect()->route('site-setting.banner')->with('info','banner update successfully.');
        

    }

    public function deleteBanner(Request $request)
    {
    	// dd($id);
        $id = $request->id;
        $deleteData = Banner::find($id);
        // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('site-setting.banner');
    }
}
