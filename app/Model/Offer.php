<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    Protected $fillable = ['title','short_description','long_description','image','offer_url','sort_order','url_link_type'];
}
