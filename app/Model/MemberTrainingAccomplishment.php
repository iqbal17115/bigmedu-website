<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberTrainingAccomplishment extends Model
{
    protected $fillable = ['member_id','training_title','training_from_month','training_from_year','training_to_month','training_to_year','training_description','training_url_link'];
}
