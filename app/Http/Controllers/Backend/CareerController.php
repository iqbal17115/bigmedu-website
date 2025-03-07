<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Career;
use App\Model\News;

class CareerController extends Controller
{
    public function careerJobs()
    {
        $today = date('Y-m-d');
        //dd($today);
        // $data['news'] = News::get();
        $data['careers'] = Career::where('end_date','>=',$today)->orderBy('start_date','DESC')->get();
        return view('frontend.career_jobs')->with($data);
    }

    public function careerJobsView($id)
    {
        $data['career'] = Career::find($id);
        return view('frontend.view_career_jobs')->with($data);
    }

    public function index()
    {
    	$data['careers'] = Career::orderBy('start_date','DESC')->get();
    	return view('backend.career.career-list')->with($data);
    }

    public function addCareer()
    {

    	return view('backend.career.career-add');
    }

    public function storeCareer(Request $request)
    {
        // dd($request->all());
       $request->validate([
        'title' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        // 'image' => 'required',
    ]);
       
       $params = $request->all();
       $params['start_date'] = date('Y-m-d',strtotime($request->start_date));
       $params['end_date'] = date('Y-m-d',strtotime($request->end_date));
       // dd($params);
       if ($file = $request->file('attachment'))
       {
        $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/career'), $filename);
        // $image=Image::make(public_path('upload/career/').$filename);
        // $image->resize(643,360)->save(public_path('upload/career/').$filename);
        $params['attachment']= $filename;
    }
    Career::create($params);

    return redirect()->route('top-menu.career')->with('info', 'Career store successfully.');
}

public function editCareer($id)
{
    $data['editData'] = Career::find($id);
    return view('backend.career.career-add')->with($data);

}

public function updateCareer(Request $request,$id)
{
    	// dd($request->all());
    $request->validate([
        'title' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        // 'image' => 'required',
    ]);
    $params = $request->all();
    $params['start_date'] = date('Y-m-d',strtotime($request->start_date));
    $params['end_date'] = date('Y-m-d',strtotime($request->end_date));
    $data = Career::find($id);

    if ($file = $request->file('attachment'))
    {
        @unlink(public_path('upload/career/'.$data->attachment));
        $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/career'), $filename);
        // $image=Image::make(public_path('upload/career/').$filename);
        // $image->resize(643,360)->save(public_path('upload/career/').$filename);
        $params['attachment']= $filename;
    }
    $data->update($params);
    return redirect()->route('top-menu.career')->with('info','Career Updated successfully.');

}

public function deleteCareer(Request $request)
{
    	// dd($id);
    $id = $request->id;
    $deleteData = Career::find($id);
    @unlink(public_path('upload/career/'.$deleteData->attachment));
    $deleteData->delete();
    return redirect()->route('top-menu.career');
}
}
