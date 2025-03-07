<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProgramInfo;

class ProgramController extends Controller
{
    //
    public function index()
    {
        $data['programs'] = ProgramInfo::all();
        return view('backend.program.list')->with($data);
    }

    public function add()
    {
        return view('backend.program.add');
    }

    public function store(Request $request)
    {
        $request->validate([
    		'name' => 'required',
    	]);
    	$params = $request->all();

    	ProgramInfo::create($params);
    	return redirect()->route('site-setting.program')->with('info','Data add Successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = ProgramInfo::find($id);
    	return view('backend.program.add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
    	$data = ProgramInfo::find($id);
    	$params = $request->all();
        
    	$data->update($params);

    	return redirect()->route('site-setting.program')->with('info','Data Update Successfully');
    }

    public function delete(Request $request)
    {
        $data = ProgramInfo::find($request->id);
    	$data->delete();
    }
}
