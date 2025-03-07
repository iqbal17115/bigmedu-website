<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = "alumnies";
    protected $fillable = ['title','subtitle','image','session','batch','program_name','completion_year','birth_date','email','blood_group','mobile_no','designation','nid_birth_passport','organization_name','professional_information','address','duration'];
}
