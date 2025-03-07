<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CompletedResearch extends Model
{
    Protected $table = "completed_researches";
    Protected $fillable = ['title','author','journal_name','publish_status','pdf','date','year','journal_index','journal_category','url','type'];
}
