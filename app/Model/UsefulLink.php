<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsefulLink extends Model
{
    protected $fillable = ['title','link','url_link_type'];
}
