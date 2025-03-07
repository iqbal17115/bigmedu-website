<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    Protected $fillable = ['title','image','date','short_description','long_description','sort_order','status'];
}
