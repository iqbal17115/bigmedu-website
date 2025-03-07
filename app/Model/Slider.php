<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    //
    use SoftDeletes;
    Protected $fillable = ['description','show_description','image'];
}
