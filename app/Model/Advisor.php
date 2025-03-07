<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    Protected $fillable = ['title','short_description','long_description','image','designation'];
}
