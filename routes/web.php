<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SepedaController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\DetailPenyewaanController;
use App\Http\Controllers\FullCalendarController;



Auth::routes();

// Admin Route
Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('kategori', KategoriController::class);
Route::resource('sepeda', SepedaController::class);
Route::resource('paket', PaketController::class);
Route::resource('penyewaan', PenyewaanController::class);
Route::get('updateStatus/{penyewaan}', [PenyewaanController::class, 'updateStatus'])->name('penyewaan.updateStatus');
Route::resource('datarekap', DetailPenyewaanController::class);
Route::get('/calendar', [FullCalendarController::class, 'index'])->name('calendar.index');
Route::get('/datarekap/export/all', [DetailPenyewaanController::class, 'export_excel'])->name('export_excel');



// Customer Route
Route::get('about', function(){
    return view('customer.about');
});
Route::resource('cart', CartController::class);
Route::resource('product', ProductController::class);
Route::get('detail/{sepeda}', [ProductController::class, 'detail'])->name('product.detail');




