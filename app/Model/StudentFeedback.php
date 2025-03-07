<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentFeedback extends Model
{
    protected $table = "student_feedbacks";
    protected $fillable = ['title','subtitle','description','long_description','image','sort_order'];
}
