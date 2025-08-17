<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = [
      "service_name", "description", "service_description_on_page",
      "service_image_main", "service_image_bg",
    ];

    public function scopeGetImage($query){
      return $query->join('gallery_images', 'services.service_image_main', '=', 'gallery_images.id');
    }
    public function scopeGetBGImage($query){
      return $query->join('gallery_images', 'services.service_image_bg', '=', 'gallery_images.id');
    }
}
