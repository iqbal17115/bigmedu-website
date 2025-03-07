<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LibrarySlider;
use App\Model\LibraryTimeSchedule;
use App\Model\News;
use App\Model\BooksPublication;
use App\Model\LibrarySubject;

class LibrarySliderController extends Controller
{
    public function libraryFront()
    {
    	$data['slider'] = LibrarySlider::orderBy('id','desc')->get();
        $data['timeSchedule'] = LibraryTimeSchedule::first();
        $data['news'] = News::where('type',1)->where('course_info_id',null)->orderBy('id','desc')->take(6)->get();
        

        $data['event'] = News::where('type',2)->where('course_info_id',null)->orderBy('id','desc')->take(6)->get();
        

        $data['notice'] = News::where('type',3)->where('course_info_id',null)->orderBy('id','desc')->take(6)->get();
    	return view('frontend.library-front')->with($data);
    }

    public function index()
    {
    	$data['slider'] = LibrarySlider::orderBy('id','desc')->get();
    	return view('backend.library.slider.slider-view')->with($data);
    }

    public function addSlider()
    {
    	return view('backend.library.slider.slider-add');
    }

    public function storeSlider(Request $request)
    {
    	$request->validate([
    		// 'title' => 'required',
    		// 'description' => 'required',
    		'image' => 'required',

    	]);
        $params = $request->all();
    	if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/library/slider'), $filename);
            // $image=Image::make(public_path('upload/slider/').$filename);
            // $image->resize(1700,1100)->save(public_path('upload/slider/').$filename);
            $params['image']= $filename;
        }
    	LibrarySlider::create($params);
    	return redirect()->route('library-management.slider')->with('info','New Slider Upload Successfully.');


    }

    public function editSlider($id)
    {
    	$data['editData'] = LibrarySlider::find($id);
    	return view('backend.library.slider.slider-add')->with($data);
    }

    public function updateSlider(Request $request, $id)
    {
        $request->validate([
            // 'title' => 'required',
            // 'description' => 'required',
            // 'image' => 'required',

        ]);
    	$data = LibrarySlider::find($id);
        $params = $request->all();
    	if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/slider/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/library/slider'), $filename);
            // $image=Image::make(public_path('upload/slider/').$filename);
            // $image->resize(1700,1100)->save(public_path('upload/slider/').$filename);
            $params['image']= $filename;
            
        }
    	$data->update($params);

    	return redirect()->route('library-management.slider')->with('info','Slider Update Successfully');

    }

    public function deleteSlider(Request $request)
    {
    	$data = LibrarySlider::find($request->id);
    	$data->delete();
    }

    public function librarySubjectWiseBook()
    {
        $data['subjects'] = LibrarySubject::where('show_status',1)->orderBy('sort_order')->get();
        return view('frontend.library_subject_wise_book')->with($data);
    }

    public function view_library_book_pdf($id)
    {
        $data['book'] = BooksPublication::where('id',$id)->first();
        //dd($data['book']);
        return view('frontend.library_book_pdf')->with($data);
    }

}
