<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JournalPaper extends Model
{
    Protected $fillable = ['paper_title','authors','email','abstract','research_area','country','attachment1','attachment2','mobile'];
}
