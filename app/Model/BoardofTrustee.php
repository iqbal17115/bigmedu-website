<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BoardofTrustee extends Model
{
    protected $table = "board_of_trustees";
    protected $fillable = ['member_id','designation','sort_order'];

    public function member()
    {
        return $this->hasOne(Member::class,'id','member_id');
    }
}
