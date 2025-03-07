<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Research;
use Image;

class ResearchController extends Controller
{
    //
    public function index()
    {

    	$data['research'] = Research::all();
    	return view('backend.research.research-view')->with($data);

    }

    public function addResearch()
    {
    	return view('backend.research.research-add');

    }

    public function storeResearch(Request $request)
    {

    	// $data = new Research;
        $request->validate([
            'title' => 'required',
        // 'date' => 'required',
            'image' => 'required',
        ]);
        $params = $request->all();
        if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/research'), $filename);
            $image=Image::make(public_path('upload/research/').$filename);
            $image->resize(350,230)->save(public_path('upload/research/').$filename);
            $params['image']= $filename;
        }

        Research::create($params);
        return redirect()->back()->with('info','Research store successfully.');
        
    }

    public function editResearch($id)
    {
        $data['editData'] = Research::find($id);
        // dd($editData->toArray( ));
        return view('backend.research.research-add')->with($data);



    }

    public function updateResearch(Request $request,$id)
    {
    	// dd($request->all());
         $request->validate([
        'title' => 'required',
        // 'date' => 'required',
        // 'image' => 'required',
    ]);
        $params = $request->all();
        $data = Research::find($id);

        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/research/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/research'), $filename);
            $image=Image::make(public_path('upload/research/').$filename);
            $image->resize(350,230)->save(public_path('upload/research/').$filename);
            $params['image']= $filename;
            
        }
        $data->update($params);
        return redirect()->route('site-setting.research')->with('info','Research update successfully.');
        

    }

    public function deleteResearch(Request $request)
    {
    	// dd($id);
        $id = $request->id;
        $deleteData = Research::find($id);
        // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('site-setting.research');
    }
}
