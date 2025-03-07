<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberAdministrativeExperience extends Model
{
    protected $fillable = ['member_id','administrative_designation','administrative_details','administrative_from_month','administrative_from_year','administrative_to_month','administrative_to_year'];
}
