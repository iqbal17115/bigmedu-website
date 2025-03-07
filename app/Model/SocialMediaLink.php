<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SocialMediaLink extends Model
{
    Protected $fillable = ['facebook_link','twitter_link','instagram_link','linkedin_link','youtube_link','whatsapp_link','pinterest_link','mail_link','facebook_status','twitter_status','instagram_status','linkedin_status','youtube_status','whatsapp_status','pinterest_status','mail_status'];
}
