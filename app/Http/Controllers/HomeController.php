<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenyewaan;
use App\Models\Penyewaan;

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
        return view('home');
    }

    public function adminHome()
    
    {
        $penyewaan = Penyewaan::with('DetailPenyewaan')->get();
        return view ('admin.penyewaanIndex', compact('penyewaan', $penyewaan));

    }
}
