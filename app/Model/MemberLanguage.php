<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberLanguage extends Model
{
    protected $fillable = ['member_id','language','proficiency_level'];
}
