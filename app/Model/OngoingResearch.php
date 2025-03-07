<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OngoingResearch extends Model
{
    Protected $table = "ongoing_researches";
    Protected $fillable = ['title','author','date','area_of_research','status'];
}
