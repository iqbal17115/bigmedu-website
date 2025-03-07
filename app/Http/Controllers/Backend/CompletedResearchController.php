<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\CompletedResearch;

class CompletedResearchController extends Controller
{
    public function index()
    {
        $data['completedResearches'] = CompletedResearch::orderBy('date','desc')->get();
        return view('backend.completed_research.completed_research-list')->with($data);
    }

    public function add()
    {

    	return view('backend.completed_research.completed_research-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([

        ]);
       //dd($request->date);
       $params = $request->all();
       //dd($params);
       $params['date'] = date('Y-m-d',strtotime($request->date));

    //    if ($file = $request->file('pdf'))
    //    {
    //         $filename =time() . '.' . $file->getClientOriginalName();
    //         $file->move(public_path('upload/completed_research'), $filename);
    //         $params['pdf']= $filename;
    //     }

        CompletedResearch::create($params);

        return redirect()->route('frontend-menu.completed_research')->with('info', 'Store successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = CompletedResearch::find($id);
        return view('backend.completed_research.completed_research-add')->with($data);

    }

    public function update(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $params['date'] = date('Y-m-d',strtotime($request->date));

        $data = CompletedResearch::find($id);
        // if ($file = $request->file('attachment'))
        // {
        //     @unlink(public_path('upload/completed_research/'.$data->attachment));
        //     $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('upload/completed_research'), $filename);
        //     $params['attachment']= $filename;
        // }
        $data->update($params);
        return redirect()->route('frontend-menu.completed_research')->with('info','Update successfully.');

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $deleteData = CompletedResearch::find($id);
        // @unlink(public_path('upload/completed_research/'.$deleteData->pdf));
        $deleteData->delete();
        return redirect()->route('frontend-menu.completed_research');
    }
}
