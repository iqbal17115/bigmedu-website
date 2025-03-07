<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    //
    Protected $fillable = ['name','email','phone','subject','message'];
}
