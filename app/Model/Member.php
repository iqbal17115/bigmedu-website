<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','email','phone','about','image','member_designation','work_place','show_phone'];

    public function BOT()
    {
        return $this->belongsTo(BoardofTrustee::class,'member_id','id');
    }

    public function GOV()
    {
        return $this->belongsTo(GoverningBody::class,'member_id','id');
    }
}

