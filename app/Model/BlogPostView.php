<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogPostView extends Model
{
    Protected $fillable = ['blog_post_id','session_id','blog_user_id','ip','agent','number_of_view'];

    public function post()
    {
        return $this->belongsTo('App\Model\BlogPost','blog_post_id','id');
    }
}
