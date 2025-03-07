<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberSocialWelfare extends Model
{
    protected $fillable = ['member_id','social_designation','social_organization_details','social_from_month','social_from_year','social_to_month','social_to_year'];
}
