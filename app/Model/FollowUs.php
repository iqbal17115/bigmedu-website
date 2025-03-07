<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FollowUs extends Model
{
    //
    Protected $fillable = ['facebook_url','twitter_url','youtube_url','googleplus_url','instagram_url'];
}
