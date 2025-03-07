<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberProfessionalResponsibility extends Model
{
    protected $fillable = ['member_id','responsibilities_designation','responsibilities_url_link','responsibilities_organization_name','responsibilities_from_year','responsibilities_to_year'];
}
