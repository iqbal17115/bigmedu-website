<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    Protected $fillable = ['category_name','sort_order'];

    public function blog_posts()
    {
        return $this->hasMany('App\Model\BlogPost', 'category_id', 'id');
    }

}
