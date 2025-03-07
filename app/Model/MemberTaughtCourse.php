<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberTaughtCourse extends Model
{
    protected $fillable = ['member_id','taught_course'];
}
