<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UpcomingTraining;

class UpcomingTrainingController extends Controller
{
    public function index()
    {
        $data['upcomingTrainings'] = UpcomingTraining::orderBy('start_date','desc')->get();
        return view('backend.upcoming_training.upcoming_training-list')->with($data);
    }

    public function add()
    {

    	return view('backend.upcoming_training.upcoming_training-add');
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
       UpcomingTraining::create($params);

        return redirect()->route('frontend-menu.upcoming_training')->with('info', 'Store successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = UpcomingTraining::find($id);
        return view('backend.upcoming_training.upcoming_training-add')->with($data);

    }

    public function update(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $params['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $params['end_date'] = date('Y-m-d',strtotime($request->end_date));

        $data = UpcomingTraining::find($id);
        $data->update($params);
        return redirect()->route('frontend-menu.upcoming_training')->with('info','Update successfully.');

    }

    public function delete(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = UpcomingTraining::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('frontend-menu.upcoming_training');
    }
}
