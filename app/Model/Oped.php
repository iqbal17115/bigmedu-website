<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Oped extends Model
{
    Protected $fillable = ['title','url','image','description','author_name','newspaper_name','date'];
}
