<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceGallery extends Model
{
    protected $table = 'service_gallery';
    protected $fillable= [
        'service_id', 'image_id',
    ];
    public function scopeGetGallery($query, $service_id){
        return $query->join('gallery_images', 'gallery_images.id', '=', 'service_gallery.image_id')
        ->where('service_gallery.service_id', $service_id);
    }
    
}
