<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberPublicationBook extends Model
{
    protected $fillable = ['member_id','book_title','book_month','book_year','book_description','book_url_link'];
}
