<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenyewaan;
use App\Models\Penyewaan;
use App\Models\Paket;
use App\Models\Sepeda;
use App\Models\Galeri;
use App\Models\Pesan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pesan = Pesan::get();
        $galeri = Galeri::all();
        return view ('home', compact('pesan', 'galeri'));
    }

    public function adminHome()
    
    {
        $penyewaan = Penyewaan::with('DetailPenyewaan')->get();
        $sepeda = Sepeda::all();
        $paket = Paket::all();
        $pesan = Pesan::all();
        $galeri = Galeri::all();
        return view ('admin.penyewaanIndex', compact('penyewaan', 'paket', 'sepeda', 'pesan', 'galeri'));

    }
}
