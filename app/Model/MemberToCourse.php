<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberToCourse extends Model
{
    protected $fillable = ['course_info_id','member_id','faculty_type_id','sort_order'];

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','id');
    }

    public function faculty_type()
    {
        return $this->belongsTo(FacultyType::class,'faculty_type_id','id');
    }

    public function course_info()
    {
        return $this->hasOne(CourseInfo::class,'id','course_info_id');
    }
}
