<?php

namespace App\Http\Controllers\Backend\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\MenuPost;

class PostController extends Controller
{
    public function view(){
        $posts = MenuPost::where('status','1')->get();
        return view('backend.post.post-view', compact('posts'));
    }

    public function add(){
    	return view('backend.post.post-add');
    }

    public function store(Request $request){
        $post = new MenuPost();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->created_by = Auth::user()->id;
        $post->save();

        return redirect()->route('frontend-menu.post.view')->with('success','Data! successfully inserted');
    }

    public function edit($id){
        $editData = MenuPost::find($id);
        return view('backend.post.post-add', compact('editData'));
    }

    public function update(Request $request ,$id){
    	$post = MenuPost::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->updated_by = Auth::user()->id;
        $post->save();

        return redirect()->route('frontend-menu.post.view')->with('success','Data! successfully updated');
    }
    
    public function destroy(Request $request){ 
        // $id  = $request->input('id');
        // DB::table('posts')
        //         ->where('id', $id)
        //         ->update(['status' => 0]);
        // return redirect()->route('report.post.list');
        $id = $request->id;
        $deleteData = MenuPost::find($id);
        // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->back();
    }
}
