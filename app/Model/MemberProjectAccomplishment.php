<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberProjectAccomplishment extends Model
{
    protected $fillable = ['member_id','project_title','project_url_link','project_from_month','project_from_year','project_to_month','project_to_year','project_description'];
}
