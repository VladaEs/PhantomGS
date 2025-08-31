<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $table = 'services';
  protected $fillable = [
    "service_name",
    "description",
    "service_description_on_page",
    "service_image_main",
    "service_image_bg",
  ];

  public function scopeGetImage($query)
  {
    return $query->join('gallery_images', 'services.service_image_main', '=', 'gallery_images.id')
    ->addSelect('services.*', 'gallery_images.id as service_image_main_id', 'gallery_images.image_location as image_location', 'gallery_images.image_name as image_name');
  }
  public function scopeGetBGImage($query)
  {
    return $query->join('gallery_images', 'services.service_image_bg', '=', 'gallery_images.id');
  }

  public function scopeWithImages($query)
  {
    return $query
      ->join('gallery_images as bg_image', 'services.service_image_bg', '=', 'bg_image.id')
      ->join('gallery_images as main_image', 'services.service_image_main', '=', 'main_image.id')
      ->addSelect([
      'services.*', 'bg_image.image_location as bg_image_location', 'bg_image.image_name as bg_image_name', 
      'main_image.image_name as main_image_name', 'main_image.image_location as main_image_location'
      ]);
  }
}
