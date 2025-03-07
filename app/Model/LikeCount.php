<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LikeCount extends Model
{
    Protected $fillable = ['user_id','blog_post_id','like_count'];

    /**
     * Get the users with liked
     */
    public function blog_users()
    {
        return $this->belongsTo('App\Model\BlogUser','user_id','id');
    }

    /**
     * Get the posts with liked.
     */
    public function blog_posts()
    {
        return $this->belongsTo('App\Model\BlogPost','blog_post_id','id');
    }
}
