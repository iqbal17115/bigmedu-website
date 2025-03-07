<?php

namespace App\Http\Controllers\Frontend\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use App\Model\BlogPost;
use App\Model\Partnership;
use App\Model\LikeCount;
use App\Model\BlogComment;
use App\Model\BlogPostView;
use App\Model\BlogUser;

class BlogController extends Controller
{
    public function home()
    {  
        $data['partnership'] = Partnership::all();
        return view('frontend.blog.home')->with($data);
    }

    public function storeBlogPost(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'image' => 'required',
        //     'category_id' => 'required',
        //     'description' => 'required',
        // ]);

        $params = $request->all();

        if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/post_category'), $filename);
            $params['image']= $filename;
        }
        BlogPost::create($params);
        return redirect()->route('blog_user.all_blog_post')->with('success', 'Post created successfully.');
    }

    public function editBlogPost($id)
    {
        $data['editData'] = BlogPost::where('id',$id)->first();
        return view('frontend.blog.home')->with($data);
    }

    public function updateBlogPost(Request $request,$id)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'image' => 'required',
        //     'category_id' => 'required',
        //     'description' => 'required',
        // ]);

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
        return redirect()->back()->with('success', 'Post updated successfully.');
    }

    public function deleteBlogPost(Request $request)
    {
    	$data = BlogPost::find($request->id);
    	$data->delete();
    }

    public function allBlogPost()
    {
        $data['allBlogPosts'] = BlogPost::with('category')->where('blog_user_id',auth('blog_user')->user()->id)->get();
        //dd($data['allBlogPosts']);

        return view('frontend.blog.all_blog_post')->with($data);

    }

    public function editProfile($id)
    {
        $data['editData'] = BlogUser::find($id);
        return view('frontend.blog.edit_profile')->with($data);
    }

    public function updateProfile(Request $request,$id)
    {
        $request->validate([
    		'name' => 'required',
    		'email' => 'required',
        ]);

        $user = BlogUser::find($id);

        
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/profile_photo/'.$user->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/profile_photo'), $filename);
            $data['image']= $filename;
            //dd($filename);
            //dd($data['image']);
        }

        if(!empty($request->password) && $request->password == $request->password_confirmation)
        {
            $data['password'] = Hash::make($request->password);
            // dd($password);
            $user->password = $data['password'];
        }
        //dd($data);
        $user->update($data);

        return redirect()->back()->with('success','Profile Updated Successfully');
    }

    public function blog()
    {   
        $data['recentPosts'] = BlogPost::with('category','blog_user')->where('status',1)->orderBy('created_at','desc')->get();
        return view('frontend.blog.blog')->with($data);
    }

    public function blogDetails($id)
    {   
        $data['singleBlogPost'] = BlogPost::with('blog_user','category')->find($id);

        $postView = BlogPostView::where('blog_user_id',auth('blog_user')->check()?auth('blog_user')->id():request()->ip)
                                    ->where('blog_post_id',$data['singleBlogPost']->id)->first();

        if($postView)
        {
            $newParams = array();
            $newParams['blog_post_id'] = $data['singleBlogPost']->id;
            $newParams['session_id'] = request()->getSession()->getId();
            $newParams['blog_user_id'] = (auth('blog_user')->check())?auth('blog_user')->id():null; 
            $newParams['number_of_view'] = $postView->number_of_view + 1;
            $newParams['ip'] = request()->ip();
            $newParams['agent'] = request()->header('User-Agent');
            $postView->update($newParams);
        }
        else
        {
            $params = array();
            $params['blog_post_id'] = $data['singleBlogPost']->id;
            $params['session_id'] = request()->getSession()->getId();
            $params['blog_user_id'] = (auth('blog_user')->check())?auth('blog_user')->id():null; 
            $params['number_of_view'] = 1;
            $params['ip'] = request()->ip();
            $params['agent'] = request()->header('User-Agent');
            BlogPostView::create($params);
        }

        return view('frontend.blog.blog_details')->with($data);
    }

    public function updateLikeCount(Request $request)
    {
        $check = LikeCount::where('user_id',$request->user_id)->where('blog_post_id',$request->blog_post_id)->first();

        
        if($check)
        {
            if($check->like_count == 0)
            {
                $params['like_count'] =  1;
            }
            else
            {
                $params['like_count'] =  0;
            }
            
            $likeModel = $check->update($params);
            if($likeModel)
            {
                return response()->json($params['like_count']);
            }
        }
        else
        {
            $params['user_id'] =  $request->user_id;
            $params['blog_post_id'] =  $request->blog_post_id;
            $params['like_count'] =  1;
            $likeModel = LikeCount::create($params);
            return response()->json($params['like_count']);
        }
    }

    public function insertComment(Request $request)
    {
        $params = $request->all();
        $blogComment = BlogComment::create($params);

        return redirect()->back()->with('success','Comment submitted successfully,  wait for approval.');
    }
}
