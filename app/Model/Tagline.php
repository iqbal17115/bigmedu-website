<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tagline extends Model
{
    protected $fillable = ['module_name','first_line_first_part','first_line_second_part','second_line_first_part','second_line_second_part'];
}
