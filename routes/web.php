<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SepedaController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('is_admin');

Route::resource('kategori', KategoriController::class);
Route::resource('sepeda', SepedaController::class);
Route::resource('paket', PaketController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
