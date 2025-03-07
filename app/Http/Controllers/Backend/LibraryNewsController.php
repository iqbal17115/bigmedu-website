<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LibraryNews;

class LibraryNewsController extends Controller
{
    public function libraryAllNews()
    {
        $data['libraryNews'] = LibraryNews::orderBy('id','desc')->get();
        return view('frontend.library_all_news')->with($data);
    }
    public function singleLibraryNews($id)
    {
        $data['find_post'] = LibraryNews::find($id);
    	return view('frontend.single_library_news')->with($data);
    }
    public function index()
    {
        $data['libraryNews'] = LibraryNews::orderBy('id','desc')->get();

    	return view('backend.library.news.news-view')->with($data);
    }

    public function add()
    {
    	return view('backend.library.news.news-add');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		// 'title' => 'required',
    		// 'description' => 'required',
    		'image' => 'required',

    	]);
        $params = $request->all();
    	if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/library/library_news/'), $filename);
            $params['image']= $filename;
        }
    	LibraryNews::create($params);
    	return redirect()->route('library-management.library_news')->with('info','Library News add Successfully.');


    }

    public function edit($id)
    {
    	$data['editData'] = LibraryNews::find($id);
    	return view('backend.library.news.news-add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'title' => 'required',
            // 'description' => 'required',
            // 'image' => 'required',

        ]);
    	$data = LibraryNews::find($id);
        $params = $request->all();
    	if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/library/library_news/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/library/library_news/'), $filename);
            $params['image']= $filename;
            
        }
    	$data->update($params);

    	return redirect()->route('library-management.library_news')->with('info','Library News Update Successfully');

    }

    public function delete(Request $request)
    {
    	$data = LibraryNews::find($request->id);
    	$data->delete();
    	
    }
}
