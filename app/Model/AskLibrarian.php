<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AskLibrarian extends Model
{
    Protected $fillable = ['name','email','phone','subject','message'];
}
