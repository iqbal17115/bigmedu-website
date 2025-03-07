<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberOped extends Model
{
    protected $fillable = ['member_id','op_ed_title','op_ed_date','op_ed_description','op_ed_url_link'];
}
