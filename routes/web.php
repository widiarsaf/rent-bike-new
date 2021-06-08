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
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\GaleriController;



Auth::routes();

// Admin Route for Checking
Route::get('/admin', function () {
    if (Auth::check()) {
        return redirect()->route('admin.home');
    }
    return redirect()->route('login');
});
Route::get('/penyewaan', function () {
    if (Auth::check()) {
        return redirect()->route('penyewaan.index');
    }
    return redirect()->route('login');
});
Route::get('/sepeda', function () {
    if (Auth::check()) {
        return redirect()->route('sepeda.index');
    }
    return redirect()->route('login');
});
Route::get('/katalog', function () {
    if (Auth::check()) {
        return redirect()->route('katalog.index');
    }
    return redirect()->route('login');
});
Route::get('/kategori', function () {
    if (Auth::check()) {
        return redirect()->route('katgeori.index');
    }
    return redirect()->route('login');
});
Route::get('/pembayaran', function () {
    if (Auth::check()) {
        return redirect()->route('pembayaran.index');
    }
    return redirect()->route('login');
});
Route::get('/pesan', function () {
    if (Auth::check()) {
        return redirect()->route('pesan.index');
    }
    return redirect()->route('login');
});
Route::get('/galeri', function () {
    if (Auth::check()) {
        return redirect()->route('galeri.index');
    }
    return redirect()->route('login');
});
Route::get('/datarekap', function () {
    if (Auth::check()) {
        return redirect()->route('datarekap.index');
    }
    return redirect()->route('login');
});
Route::get('/daftarAdmin', function () {
    if (Auth::check()) {
        return redirect()->route('daftarAdmin.index');
    }
    return redirect()->route('login');

});
Route::get('/daftarCustomer', function () {
    if (Auth::check()) {
        return redirect()->route('daftarCustomer.index');
    }
    return redirect()->route('login');
});


// 
Route::get('/admin/index', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/admin/kategori', KategoriController::class)->middleware('is_admin');
Route::resource('/admin/sepeda', SepedaController::class)->middleware('is_admin');
Route::resource('/admin/katalog', KatalogController::class)->middleware('is_admin');
Route::resource('/admin/paket', PaketController::class)->middleware('is_admin');
Route::resource('/admin/penyewaan', PenyewaanController::class)->middleware('is_admin');
Route::resource('/admin/daftarAdmin', AdminController::class)->middleware('is_admin');
Route::resource('/admin/daftarCustomer', CustomerController::class)->middleware('is_admin');
Route::resource('/admin/pembayaran', PembayaranController::class)->middleware('is_admin');
Route::resource('/admin/pesan', PesanController::class)->middleware('is_admin');
Route::resource('/admin/galeri', GaleriController::class)->middleware('is_admin');
Route::resource('/admin/datarekap', DetailPenyewaanController::class)->middleware('is_admin');
Route::get('updateStatus/{penyewaan}', [PenyewaanController::class, 'updateStatus'])->name('penyewaan.updateStatus');
Route::get('/calendar', [FullCalendarController::class, 'index'])->name('calendar.index');
Route::get('/datarekap/export/all', [DetailPenyewaanController::class, 'export_excel'])->name('export_excel');
Route::get('/detailPenyewaan/print/nota/{id}', [PenyewaanController::class, 'export_pdf'])->name('printNota');


// Customer Route
Route::get('about', function(){
    return view('customer.about');
});
Route::get('/product/sepeda/all', [SepedaController::class, 'sepedaCustomer'])->name('sepedaCustomer');
Route::get('/product/sepeda/{params}', [SepedaController::class, 'sepedaCustomerDetail'])->name('sepedaCustomerDetail');
Route::get('/riwayatPenyewaan/all/{params}', [PenyewaanController::class, 'penyewaanCustomer'])->name('penyewaanCustomer');




