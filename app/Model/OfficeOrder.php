<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OfficeOrder extends Model
{
    Protected $fillable = ['title','publish_date','status'];
}
