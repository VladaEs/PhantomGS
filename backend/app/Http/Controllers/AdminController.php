<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        
        return view('admin.index');
    }

    public function CreateService(){
        return view('admin.createService');
    }

    public function StoreService(Request $request){
        

        $validated= $request->validate([
            'serviceTitle'=> ['required', 'string', 'max:255'],
            'ServiceDescription'=> ['required', 'string', 'max:255'],
            'serviceImage'=> ['required','image','mimes:jpg,png,jpeg', 'max:15000'],
        ]);
        

        // save file in a local drive(private)

        $folder = 'servicesImages';
        $path = $request->file('serviceImage')->store($folder, 'public');
        $filename = basename($path);
        dd($path, $filename);

        
        


    }


}
