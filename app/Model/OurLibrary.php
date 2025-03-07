<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OurLibrary extends Model
{
    Protected $fillable = ['title','description','image','sort_order'];
}
