<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseInfo extends Model
{
    protected $fillable = ['program_info_id','name','short_name'];
}
