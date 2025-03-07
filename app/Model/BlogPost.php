<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    Protected $fillable = ['category_id','title','description','image','status','publisher_name','blog_user_id'];

    /**
     * Get the category of the post.
     */
    public function category()
    {
        return $this->belongsTo('App\Model\PostCategory','category_id','id');
    }

    /**
     * Get the user who created the post.
     */
    public function blog_user()
    {
        return $this->belongsTo('App\Model\BlogUser','blog_user_id','id');
    }

    public function likes()
    {
        return $this->hasMany('App\Model\LikeCount','blog_post_id','id');
    }

    public function postView()
    {
        return $this->hasMany('App\Model\BlogPostView','blog_post_id','id');
    }
}
