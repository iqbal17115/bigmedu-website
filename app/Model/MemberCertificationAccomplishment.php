<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberCertificationAccomplishment extends Model
{
    protected $fillable = ['member_id','certification_title','certification_month','certification_year','certification_description','certification_url_link'];
}
