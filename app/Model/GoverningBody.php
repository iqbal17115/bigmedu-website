<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoverningBody extends Model
{
    protected $table = "governing_body";
    protected $fillable = ['member_id','designation','sort_order'];

    public function member()
    {
        return $this->hasOne(Member::class,'id','member_id');
    }
}
