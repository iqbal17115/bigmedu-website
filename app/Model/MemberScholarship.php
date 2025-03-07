<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberScholarship extends Model
{
    protected $fillable = ['member_id','scholarship_title','scholarship_month','scholarship_year','scholarship_from','scholarship_description'];
}
