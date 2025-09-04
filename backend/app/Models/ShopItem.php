<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopItem extends Model
{
    protected $table = 'shop_items';
                
    protected $fillable = ['title', 'description', 'price' , 'service_id'];

    public function scopeGetImages($query){
        return $query->join('shop_items_gallery', 'shop_items_gallery.item_id', '=', 'shop_items.id')
        ->join('gallery_images', 'gallery_images.id', '=','shop_items_gallery.image_id' );
    }
}
