<?php

namespace App\Http\Controllers;


use App\Models\Service;
use App\Models\ShopItem;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {

        $services = Service::select('id', 'service_name')->get();
        $elementsOnPage = [
            10,
            20,
            50,
        ];
        return view('store.index', ['servicesFilter' => $services, 'elementsOnPage' => $elementsOnPage]);
    }
    public function loadItems(Request $request)
    {

        
        $categories = $request->query('category', [0]);
        $priceOrder = $request->query('price', 'ASC');
        $dateOrder  = $request->query('date', 'ASC');
        $limit = $request->query('limit', 10);
        $page = $request->query('page', 1);
        $query = ShopItem::query();
        if (!empty($categories) && !in_array(0, $categories)) {
            $query->whereIn('service_id', $categories);
        }

        $query->GetImages();
        $query->select('shop_items.*', 'gallery_images.image_location', 'gallery_images.image_name');
        $skipAmount = $limit * ($page - 1);
        $query->skip($skipAmount)->take($limit);
        $query->orderBy('price', $priceOrder)
            ->orderBy('created_at', $dateOrder);


        //$res = $query->toSql();
        
        $res = $query->get()
            ->groupBy('id') // group by shop_items.id
            ->map(function ($rows) {
                $item = $rows->first(); // now $rows is a collection of duplicates
                $item->images = $rows->map(fn($r) => [
                    'image_name' => $r->image_name,
                    'image_location' => $r->image_location,
                ])->values(); // collection of images
                return $item;
            })
            ->values(); // reset keys for clean JSON

        return $res;
    }
}

