<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BlogPost;

class ManagePostController extends Controller
{
    public function index()
    {
        $data['blogPosts'] = BlogPost::all();
        return view('backend.blog_post.blog_post-list')->with($data);
    }

    public function addBlogPost()
    {

    	return view('backend.blog_post.blog_post-add');
    }

    public function storeBlogPost(Request $request)
    {
        // dd($request->all());
        $request->validate([

        ]);
       //dd($request->date);
        $params = $request->all();
        if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/post_category'), $filename);
            $params['image']= $filename;
        }
       //dd($params);
       BlogPost::create($params);

       return redirect()->route('blog-management.blog_post')->with('info', 'Blog post store successfully.');
    }

    public function editBlogPost($id)
    {
        $data['editData'] = BlogPost::find($id);
        return view('backend.blog_post.blog_post-add')->with($data);

    }

    public function updateBlogPost(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $data = BlogPost::find($id);
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/post_category/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/post_category'), $filename);
            $params['image']= $filename;
        }
        $data->update($params);
        return redirect()->route('blog-management.blog_post')->with('info','Blog post update successfully.');

    }

    public function deleteBlogPost(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = BlogPost::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('blog-management.blog_post')->with('info','Blog post deleted successfully.');
    }
}
