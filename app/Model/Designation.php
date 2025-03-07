<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Designation extends Model
{
    //
    use SoftDeletes;
    Protected $fillable = ['name'];

    public function teacher(){
    	return $this->hasMany(Teacher::class,'designation_id','id');
    }
}
