<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.index');
})->name('home');

Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/contacts', [ServicesController::class, 'index'])->name('contacts');
Route::get('/products', [ServicesController::class, 'index'])->name('products');

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('adminMain');

    Route::get('/createService', [AdminController::class, 'CreateService'])->name('newService');
    Route::post('/createService', [AdminController::class, 'StoreService'])->name('StoreService');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



                // <li data-pageId="0"><a href="/" >Main</a></li>
                // <li data-pageId="1"><a href="/services" >Services</a></li>
                // <li data-pageId="2"><a href="/contacts" >Contacts</a></li>
                // <li data-pageId="3"><a href="/products" >Products</a></li>


require __DIR__.'/auth.php';
