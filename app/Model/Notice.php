<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    Protected $fillable = ['title','date','description'];
}
