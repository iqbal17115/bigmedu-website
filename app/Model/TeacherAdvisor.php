<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TeacherAdvisor extends Model
{
    protected $fillable = ['member_id','sort_order'];

    public function member()
    {
        return $this->hasOne(Member::class,'id','member_id');
    }
}
