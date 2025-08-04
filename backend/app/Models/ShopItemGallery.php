<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopItemGallery extends Model
{
    protected $table = 'shop_items_gallery';
    protected $fillable = ['image_id', 'item_id'];
}
