<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BooksPublication;
use App\Model\LibrarySubject;

class BooksPublicationsController extends Controller
{
    public function index()
    {
    	$data['books'] = BooksPublication::orderBy('id','desc')->get();
    	return view('backend.library.books.books-view')->with($data);
    }

    public function filterNewArrivals()
    {
    	$data['books'] = BooksPublication::orderBy('id','desc')->where('type',1)->get();
    	return view('backend.library.books.books-view')->with($data);
    }

    public function filterUpcomingBooks()
    {
    	$data['books'] = BooksPublication::orderBy('id','desc')->where('type',2)->get();
    	return view('backend.library.books.books-view')->with($data);
    }

    public function filterPublicationsJournals()
    {
    	$data['books'] = BooksPublication::orderBy('id','desc')->where('type',3)->get();
    	return view('backend.library.books.books-view')->with($data);
    }

    public function add()
    {
        $data['librarySubjects'] = LibrarySubject::where('show_status',1)->orderBy('sort_order')->get();
    	return view('backend.library.books.books-add')->with($data);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		// 'title' => 'required',
    		// 'description' => 'required',
    		//'image' => 'required',

    	]);
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
    	if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/library/books_publications'), $filename);
            $params['image']= $filename;
        }
        if ($file = $request->file('pdf'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/library/books_publications'), $filename);
            $params['pdf']= $filename;
        }
    	BooksPublication::create($params);
    	return redirect()->route('library-management.books_publications')->with('info','Book/Publication add Successfully.');


    }

    public function edit($id)
    {
        $data['editData'] = BooksPublication::find($id);
        $data['librarySubjects'] = LibrarySubject::where('show_status',1)->orderBy('sort_order')->get();
    	return view('backend.library.books.books-add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'title' => 'required',
            // 'description' => 'required',
            // 'image' => 'required',

        ]);
    	$data = BooksPublication::find($id);
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
    	if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/books/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/library/books_publications'), $filename);
            $params['image']= $filename;
            
        }
        if ($file = $request->file('pdf'))
        {
            @unlink(public_path('upload/books/'.$data->pdf));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/library/books_publications'), $filename);
            $params['pdf']= $filename;
            
        }
    	$data->update($params);

    	return redirect()->route('library-management.books_publications')->with('info','Book/Publication Update Successfully');

    }

    public function delete(Request $request)
    {
    	$data = BooksPublication::find($request->id);
    	$data->delete();
    	
    }
}
