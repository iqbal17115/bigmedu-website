<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UpcomingTraining extends Model
{
    Protected $table = "upcoming_trainings";
    Protected $fillable = ['course_name','course_details','start_date','end_date','duration','resource_persons'];
}
