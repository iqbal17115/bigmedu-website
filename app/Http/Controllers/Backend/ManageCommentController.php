<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\BlogComment;

class ManageCommentController extends Controller
{
    public function index()
    {
        $data['blogComments'] = BlogComment::orderBy('blog_post_id')->get();
        return view('backend.blog_comment.blog_comment-list')->with($data);
    }

    public function addBlogPost()
    {

    	return view('backend.blog_comment.blog_comment-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([

        ]);
       //dd($request->date);
        $params = $request->all();
       //dd($params);
       BlogComment::create($params);

       return redirect()->route('blog-management.blog_comment')->with('info', 'Blog comment store successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = BlogComment::find($id);
        return view('backend.blog_comment.blog_comment-add')->with($data);

    }

    public function update(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $data = BlogComment::find($id);
        $data->update($params);
        return redirect()->route('blog-management.blog_comment')->with('info','Blog comment update successfully.');

    }

    public function delete(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = BlogComment::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('blog-management.blog_comment')->with('info','Blog comment deleted successfully.');
    }
}
