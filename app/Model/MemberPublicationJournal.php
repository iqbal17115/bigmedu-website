<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberPublicationJournal extends Model
{
    protected $fillable = ['member_id','journal_title','journal_month','journal_year','journal_description','journal_url_link'];
}
