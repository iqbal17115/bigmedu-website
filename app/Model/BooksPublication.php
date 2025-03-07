<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BooksPublication extends Model
{
    protected $fillable = ['type','image','show_status','library_subject_id','pdf','title','show_status_for_subject'];
}
