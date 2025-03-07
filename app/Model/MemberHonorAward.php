<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberHonorAward extends Model
{
    protected $fillable = ['member_id','award_title','awarded_month','awarded_year','award_description'];
}
