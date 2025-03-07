<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OngoingTraining extends Model
{
    Protected $table = "ongoing_trainings";
    Protected $fillable = ['course_name','course_details','start_date','end_date','duration','resource_persons'];
}
