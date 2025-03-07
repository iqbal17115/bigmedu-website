<?php

namespace App\Model;

use App\Model\CourseInfo;
use App\Model\ProgramInfo;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    Protected $fillable = ['title','image','date','short_description','long_description','type','program_info_id','course_info_id','display_on_scrollbar','file','start_date','end_date'];

    public function program_info(){
    	return $this->belongsTo(ProgramInfo::class,'program_info_id','id');
    }

    public function course_info(){
    	return $this->belongsTo(CourseInfo::class,'course_info_id','id');
    }

}
