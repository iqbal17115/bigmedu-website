<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    //
    Protected $fillable = ['title','short_description','long_description','image','sort_order'];
}
