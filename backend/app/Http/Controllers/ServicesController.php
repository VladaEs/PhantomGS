<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\ServiceGallery;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $services = Service::GetImage()->get();
        

        return view('services.index', ['services'=> $services]);
    }

    public function showService($id){
        
        $serviceId= $id;
        
        $service = Service::where('services.id', $id)->GetBGImage()->first();
        $gallery = ServiceGallery::GetGallery($id)->get();
        
        return view('services.service.index', ["service"=> $service, 'gallery'=> $gallery]);
    }
}
