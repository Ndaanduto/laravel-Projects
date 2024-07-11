<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Homecontroller;
use  App\Http\Controllers\Admincontroller;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('/',[Homecontroller::class,'index']);
route::get('/redirect',[Homecontroller::class,'redirect'])->middleware('auth');
route::get('/search',[Homecontroller::class,'search'])->middleware('auth');
route::post('/addcart/{id}',[Homecontroller::class,'addcart'])->middleware('auth');
route::get('/showcart',[Homecontroller::class,'showcart'])->middleware('auth');
route::get('/delete_cart/{id}',[Homecontroller::class,'delete_cart'])->middleware('auth');
route::post('/place_order',[Homecontroller::class,'place_order'])->middleware('auth');




// route::get('/redirect',[AdminController::class,'redirect'])->middleware('auth');
route::get('/products',[Admincontroller::class,'products']);
route::post('/upload_product',[Admincontroller::class,'upload_product']);
route::get('/show_product',[Admincontroller::class,'show_product']);
route::get('/delete/{id}',[Admincontroller::class,'delete']);
route::get('/edit/{id}',[Admincontroller::class,'edit']);
route::post('/update/{id}',[Admincontroller::class,'update']);
route::get('/undelivered_orders',[Admincontroller::class,'undelivered_orders']);
route::get('/delivered_orders',[Admincontroller::class,'delivered_orders']);
route::get('/accept_order/{id}',[Admincontroller::class,'accept_order']);
route::get('/reject_order/{id}',[Admincontroller::class,'reject_order']);

