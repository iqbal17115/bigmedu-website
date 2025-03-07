<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\OngoingResearch;

class OngoingResearchController extends Controller
{
    public function index()
    {
        $data['ongoingResearches'] = OngoingResearch::orderBy('date','desc')->get();
        return view('backend.ongoing_research.ongoing_research-list')->with($data);
    }

    public function add()
    {

    	return view('backend.ongoing_research.ongoing_research-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([

        ]);
       //dd($request->date);
       $params = $request->all();
       $params['date'] = date('Y-m-d',strtotime($request->date));
       //dd($params);
       OngoingResearch::create($params);

        return redirect()->route('frontend-menu.ongoing_research')->with('info', 'Store successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = OngoingResearch::find($id);
        return view('backend.ongoing_research.ongoing_research-add')->with($data);

    }

    public function update(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $params['date'] = date('Y-m-d',strtotime($request->date));

        $data = OngoingResearch::find($id);
        $data->update($params);
        return redirect()->route('frontend-menu.ongoing_research')->with('info','Update successfully.');

    }

    public function delete(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = OngoingResearch::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('frontend-menu.ongoing_research');
    }
}
