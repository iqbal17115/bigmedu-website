<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name','faculty_slug','designation_id','email','room','phone','image','serial','website','scholar_url','facebook_url','twitter_url','googleplus_url','instagram_url','degree','description','research','patent','publication','award'];

    public function designations()
    {
    	return $this->hasOne(Designation::class,'id','designation_id');
    }

   
}
