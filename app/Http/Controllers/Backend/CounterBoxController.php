<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CounterBox;
use App\Model\CounterBackground;

class CounterBoxController extends Controller
{
    public function index()
    {
        $data['counterBoxes'] = CounterBox::all();
        return view('backend.counter_box.counter_box-list')->with($data);
    }

    public function addCounterBox()
    {

    	return view('backend.counter_box.counter_box-add');
    }

    public function storeCounterBox(Request $request)
    {
        // dd($request->all());
        $request->validate([

        ]);
       //dd($request->date);
       $params = $request->all();
       //dd($params);
       CounterBox::create($params);

        return redirect()->route('frontend-menu.counter_box')->with('info', 'Counter Box store successfully.');
    }

    public function editCounterBox($id)
    {
        $data['editData'] = CounterBox::find($id);
        return view('backend.counter_box.counter_box-add')->with($data);

    }

    public function updateCounterBox(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $data = CounterBox::find($id);
        $data->update($params);
        return redirect()->route('frontend-menu.counter_box')->with('info','Counter Box update successfully.');

    }

    public function deleteCounterBox(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = CounterBox::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('frontend-menu.counter_box');
    }

    public function storeCounterBackground(Request $request)
    {
        $request->validate([

        ]);

        $data = CounterBackground::first();
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
        if($file = $request->file('image'))
        {
            if(!empty($data))
            {
                @unlink(public_path('upload/counter/'.$data->image));
            }
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/counter'), $filename);
            $params['image']= $filename;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            CounterBackground::create($params);
        }
        
        return redirect()->route('frontend-menu.counter_box')->with('info','Background image set successfully.');
    }
}
