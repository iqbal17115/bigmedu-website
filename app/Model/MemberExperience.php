<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberExperience extends Model
{
    protected $table = "memberexperiences";
    protected $fillable = ['member_id','designation','subject','experience_institution','experience_country','experience_from_month','experience_from_year','experience_to_month','experience_to_year'];

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','id');
    }
}
