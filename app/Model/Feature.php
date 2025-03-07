<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['title','description','image','sort_order','feature_url','url_link_type'];
}
