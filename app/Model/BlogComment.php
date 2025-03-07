<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    Protected $fillable = ['user_id','blog_post_id','comment_text','status'];

    public function blog_user()
    {
        return $this->belongsTo('App\Model\BlogUser','user_id','id');
    }

    public function blog_post()
    {
        return $this->belongsTo('App\Model\BlogPost','blog_post_id','id');
    }
}
