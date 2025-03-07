<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LibrarySubject extends Model
{
    protected $fillable = ['subject_name','sort_order','show_status'];
}
