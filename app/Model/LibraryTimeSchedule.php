<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LibraryTimeSchedule extends Model
{
    Protected $fillable = ['saturday_time','sunday_time','monday_time','tuesday_time','wednesday_time','thursday_time','friday_time'];
}
