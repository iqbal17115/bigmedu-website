<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Oped;

class OpedController extends Controller
{
    public function index()
    {
        $data['opeds'] = Oped::orderBy('date','desc')->get();
        return view('backend.oped.oped-list')->with($data);
    }

    public function add()
    {

    	return view('backend.oped.oped-add');
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

       if ($file = $request->file('image'))
       {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/oped'), $filename);
            $params['image']= $filename;
        }

        Oped::create($params);

        return redirect()->route('frontend-menu.oped')->with('info', 'Store successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = Oped::find($id);
        return view('backend.oped.oped-add')->with($data);

    }

    public function update(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $params['date'] = date('Y-m-d',strtotime($request->date));

        $data = Oped::find($id);
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/oped/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/oped'), $filename);
            $params['image']= $filename;
        }
        $data->update($params);
        return redirect()->route('frontend-menu.oped')->with('info','Update successfully.');

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $deleteData = Oped::find($id);
        @unlink(public_path('upload/oped/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('frontend-menu.oped');
    }
}
