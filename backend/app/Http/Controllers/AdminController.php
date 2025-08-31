<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Models\ServiceGallery;
use App\Models\ShopItem;
use App\Models\ShopItemGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }

    public function CreateService()
    {
        return view('admin.createService');
    }

    public function StoreService(Request $request)
    {


        $validated = $request->validate([
            'serviceTitle' => ['required', 'string', 'max:255'],
            'ServiceDescription' => ['required', 'string', 'max:255'],
            'ServiceDescriptionOnPage' => ['required', 'string', 'max:1000'],

            'serviceImage' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:15000'],
            'serviceBG' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:15000'],
            'serviceGallery' => ['required', 'array'],
            'serviceGallery.*' => ['image', 'mimes:jpg,jpeg,png', 'max:15000'],

        ]);






        // save file in a local drive(private)

        $folder = 'servicesImages';




        //saving image to the gallery table to get the ID and insert it in services table
        $newService = '';
        DB::transaction(function () use ($folder, $request, &$newService) {
            $path = $request->file('serviceImage')->store($folder, 'public');
            $filename = basename($path);

            $serviceImageMain = GalleryImage::create([
                'image_location' => $folder,
                'image_name' => $filename,
            ]);

            $pathBG = $request->file('serviceBG')->store($folder, 'public');
            $filenameBG = basename($pathBG);

            $serviceImageBG = GalleryImage::create([
                'image_location' => $folder,
                'image_name' => $filenameBG,
            ]);

            $newService = Service::create([
                'service_name' => $request['serviceTitle'],
                'description' => $request['ServiceDescription'],
                'service_description_on_page' => $request['ServiceDescriptionOnPage'],
                'service_image_main' => $serviceImageMain['id'],
                'service_image_bg' => $serviceImageBG['id'],
            ]);
        });

        $gallery = $request->file('serviceGallery');
        if (is_array($gallery)) {
            foreach ($gallery as $image) {
                $pathGal = $image->store($folder, 'public');
                $filenameGal = basename($pathGal);

                DB::transaction(function () use ($folder, $filenameGal, $newService) {


                    $serviceImageGal = GalleryImage::create([
                        'image_location' => $folder,
                        'image_name' => $filenameGal,
                    ]);

                    $galeryImage = ServiceGallery::create([
                        'service_id' => $newService['id'],
                        'image_id' => $serviceImageGal['id'],
                    ]);
                });
            }
        }


        return redirect()->route('servicePage', $newService['id']);
    }
    public function createShopItem()
    {
        $services = Service::select('id', 'service_name')->get();
        return view('admin.createShopItem', ['services' => $services]);
    }
    public function StoreShopItem(Request $request)
    {


        $validated = $request->validate([
            'itemName' => ['required', 'string', 'max:255'],
            'itemDescription' => ['required', 'string', 'max:1000'],
            'itemPrice' => ['required', 'integer', 'gt:0'],
            'associatedService' => ['required', 'integer'],
            'ItemGallery' => ['required', 'array'],
            'ItemGallery.*' => ['image', 'mimes:jpg,jpeg,png', 'max:15000'],

        ]);
        
        $newProduct = ShopItem::create([
            'title' => $validated['itemName'],
            'description' => $validated['itemDescription'],
            'price' => $validated['itemPrice'],
            'associatedService' => $validated['associatedService'],
            'service_id' => $validated['itemPrice'],
        ]);

        $folder = 'shopImages';
        DB::transaction(function () use ($folder, $request, $newProduct) {
            $gallery = $request->file('ItemGallery');
            if (is_iterable($gallery)) {
                foreach ($gallery as $image) {
                    $path = $image->store($folder, 'public');
                    $filename = basename($path);
                    $itemImageGal = GalleryImage::create([
                        'image_location' => $folder,
                        'image_name' => $filename,
                    ]);
                    $galeryImage = ShopItemGallery::create([
                        'item_id' => $newProduct['id'],
                        'image_id' => $itemImageGal['id'],
                    ]);
                }
            }
        });
        
        return redirect()->route('newShopItem')->with('success', 'item has been created');
    }
}
