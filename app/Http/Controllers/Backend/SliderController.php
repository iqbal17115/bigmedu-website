<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use App\Model\SliderVideo;
use Image;

class SliderController extends Controller
{
    public function index()
    {
        // dd('test');
        $data['sliderVideo'] = SliderVideo::first();
    	$data['slider'] = Slider::orderBy('id','desc')->get();
    	return view('backend.slider.slider-view')->with($data);
    }

    public function addSlider()
    {
    	return view('backend.slider.slider-add');
    }

    public function storeSlider(Request $request)
    {
    	$request->validate([
    		// 'title' => 'required',
    		// 'description' => 'required',
    		'image' => 'required',

    	]);
        $params = $request->all();
        $params['show_description'] = $request->show_description ?? 0;
    	if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/slider'), $filename);
            // $image=Image::make(public_path('upload/slider/').$filename);
            // $image->resize(1700,1100)->save(public_path('upload/slider/').$filename);
            $params['image']= $filename;
        }
    	Slider::create($params);
    	return redirect()->route('site-setting.slider')->with('info','New Slider Upload Successfully.');


    }

    public function editSlider($id)
    {
    	$data['editData'] = Slider::find($id);
    	return view('backend.slider.slider-add')->with($data);
    }

    public function updateSlider(Request $request, $id)
    {
        $request->validate([
            // 'title' => 'required',
            // 'description' => 'required',
            // 'image' => 'required',

        ]);
    	$data = Slider::find($id);
        $params = $request->all();
        $params['show_description'] = $request->show_description ?? 0;
    	if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/slider/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/slider'), $filename);
            // $image=Image::make(public_path('upload/slider/').$filename);
            // $image->resize(1700,1100)->save(public_path('upload/slider/').$filename);
            $params['image']= $filename;
            
        }
    	$data->update($params);

    	return redirect()->route('site-setting.slider')->with('info','Slider Update Successfully');

    }

    public function deleteSlider(Request $request)
    {
    	$data = Slider::find($request->id);
    	$data->delete();
    	
    }

    public function storeSliderVideo(Request $request)
    {
        $data = SliderVideo::first();
        $params = $request->all();
        $params['show_video'] = $request->show_video ?? 0;
        $params['opacity'] = $request->opacity;
        if($request->hasFile('video'))
        {
            if(!empty($data))
            {
                @unlink(public_path('upload/slider/'.$data->video));
            }
            $path = $request->file('video')->store('videos', ['disk' => 'my_files']);
            $params['video'] = $path;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            SliderVideo::create($params);
        }
    	return redirect()->back()->with('info','Saved Successfully.');
    }
}
