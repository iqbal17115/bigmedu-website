<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\LibrarySubject;

class LibrarySubjectController extends Controller
{
    public function index()
    {
    	$data['books'] = LibrarySubject::orderBy('id','desc')->get();
    	return view('backend.library.subjects.subjects-view')->with($data);
    }

    public function add()
    {
    	return view('backend.library.subjects.subjects-add');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		// 'title' => 'required',
    		// 'description' => 'required',

    	]);
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
    	LibrarySubject::create($params);
    	return redirect()->route('library-management.library_subjects')->with('info','Add Successfully.');


    }

    public function edit($id)
    {
    	$data['editData'] = LibrarySubject::find($id);
    	return view('backend.library.subjects.subjects-add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'title' => 'required',
            // 'description' => 'required',
            // 'image' => 'required',

        ]);
    	$data = LibrarySubject::find($id);
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
    	$data->update($params);

    	return redirect()->route('library-management.library_subjects')->with('info','Update Successfully');

    }

    public function delete(Request $request)
    {
    	$data = LibrarySubject::find($request->id);
    	$data->delete();
    	
    }
}
