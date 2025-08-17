<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){

        $services = Service::select('id', 'service_name')->get();
        $elementsOnPage= [
            10, 20, 50,
        ];
        return view('store.index', ['servicesFilter' => $services, 'elementsOnPage'=> $elementsOnPage]);
    }
}
