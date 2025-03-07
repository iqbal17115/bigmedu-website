<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TrainingEnroll extends Model
{
    protected $fillable = ['title','subtitle','image','training_url','sort_order','url_link_type'];
}
