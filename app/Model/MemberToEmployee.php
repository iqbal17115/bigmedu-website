<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberToEmployee extends Model
{
    protected $fillable = ['member_id','dept_or_project','dept_id','project_id','ext_no','sort_order'];

    public function member()
    {
        return $this->hasOne(Member::class,'id','member_id');
    }
}
