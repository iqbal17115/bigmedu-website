<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    Protected $fillable = ['title','description','start_date','end_date','attachment'];
}
