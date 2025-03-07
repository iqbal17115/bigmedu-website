<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberEducation extends Model
{
    protected $table = "membereducations";
    protected $fillable = ['member_id','degree','subject','education_institution','education_country','education_year','education_to_year'];

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','id');
    }
}
