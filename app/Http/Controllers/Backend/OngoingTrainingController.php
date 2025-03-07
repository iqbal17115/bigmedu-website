<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\OngoingTraining;

class OngoingTrainingController extends Controller
{
    public function index()
    {
        $data['ongoingTrainings'] = OngoingTraining::orderBy('start_date','desc')->get();
        return view('backend.ongoing_training.ongoing_training-list')->with($data);
    }

    public function add()
    {

    	return view('backend.ongoing_training.ongoing_training-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([

        ]);
       //dd($request->date);
       $params = $request->all();
       $params['start_date'] = date('Y-m-d',strtotime($request->start_date));
       $params['end_date'] = date('Y-m-d',strtotime($request->end_date));
       //dd($params);
       OngoingTraining::create($params);

        return redirect()->route('frontend-menu.ongoing_training')->with('info', 'Store successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = OngoingTraining::find($id);
        return view('backend.ongoing_training.ongoing_training-add')->with($data);

    }

    public function update(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $params['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $params['end_date'] = date('Y-m-d',strtotime($request->end_date));

        $data = OngoingTraining::find($id);
        $data->update($params);
        return redirect()->route('frontend-menu.ongoing_training')->with('info','Update successfully.');

    }

    public function delete(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = OngoingTraining::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('frontend-menu.ongoing_training');
    }
}
