<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberConference extends Model
{
    protected $fillable = ['member_id','conference_title','conference_url','conference_month','conference_year','conference_description'];
}
