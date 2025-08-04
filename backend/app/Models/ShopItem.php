<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopItem extends Model
{
    protected $table = 'shop_items';
                
    protected $fillable = ['title', 'description', 'price' , 'service_id'];
}
