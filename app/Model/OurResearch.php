<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OurResearch extends Model
{
    protected $table = "our_researches";
    Protected $fillable = ['title','description','image','sort_order'];
}
