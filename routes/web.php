<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductControler;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::controller(ProductControler::class)->group(function(){
    Route::get('/product-details/{name}/{id}','productDetails')->where('name', '^[^%]+$')->name('productDetails');
    Route::get('/add-to-cart/{id}','addToCart')->middleware('auth.check')->name('addToCart');
    Route::get('/cart-view','cartView')->middleware('auth.check')->name('cartView');
    Route::get('/delete/{id}','deleteFromCart')->name('deleteFromCart');
});

Route::controller(OrderController::class)->group(function(){
    Route::post('/order','orderExecute')->name('orderExecute');

});


