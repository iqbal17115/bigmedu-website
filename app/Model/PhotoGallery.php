<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    Protected $fillable = ['title','description','publish_date','status'];
}
