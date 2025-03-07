<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    Protected $fillable = ['title','description','youtube_link','publish_date','status'];
}
