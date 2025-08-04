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
        return $query->where('service_id', $service_id);
    }
}
