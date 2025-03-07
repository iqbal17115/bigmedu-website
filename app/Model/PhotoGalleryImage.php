<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhotoGalleryImage extends Model
{
    protected $table = "photo_gallery_images";
    
    Protected $fillable = ['photo_gallery_id','image'];
}
