<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DepartmentHead extends Model
{
	use SoftDeletes;
	protected $fillable = ['name','title','address','designation','email','phone','image','serial','short_description','long_description','website','facebook_url','twitter_url','googleplus_url','instagram_url'];

}
