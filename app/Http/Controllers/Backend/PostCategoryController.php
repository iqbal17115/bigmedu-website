<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PostCategory;

class PostCategoryController extends Controller
{
    public function index()
    {
        $data['postCategories'] = PostCategory::all();
        return view('backend.post_category.post_category-list')->with($data);
    }

    public function addPostCategory()
    {

    	return view('backend.post_category.post_category-add');
    }

    public function storePostCategory(Request $request)
    {
        // dd($request->all());
        $request->validate([

        ]);
       //dd($request->date);
       $params = $request->all();
       //dd($params);
       PostCategory::create($params);

        return redirect()->route('blog-management.post_category')->with('info', 'Counter Box store successfully.');
    }

    public function editPostCategory($id)
    {
        $data['editData'] = PostCategory::find($id);
        return view('backend.post_category.post_category-add')->with($data);

    }

    public function updatePostCategory(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $data = PostCategory::find($id);
        $data->update($params);
        return redirect()->route('blog-management.post_category')->with('info','Counter Box update successfully.');

    }

    public function deletePostCategory(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = PostCategory::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('blog-management.post_category');
    }
}
