<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SepedaController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('admin', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('kategori', KategoriController::class);
Route::resource('sepeda', SepedaController::class);
Route::resource('paket', PaketController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
