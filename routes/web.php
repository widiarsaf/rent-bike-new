<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SepedaController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\HomeController;



Auth::routes();

Route::get('admin', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('kategori', KategoriController::class);
Route::resource('sepeda', SepedaController::class);
Route::resource('paket', PaketController::class);

Route::get('about', function(){
    return view('customer.about');
});
Route::get('sepeda', function(){
    return view('customer.product');
});
Route::get('cart', function(){
    return view('customer.cart');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
