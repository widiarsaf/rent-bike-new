<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepeda;
use App\Models\Paket;
use App\Models\Kategori;

class ProductController extends Controller
{
    
    public function index()
    {
        // Get id from each kategori name

        $mtb = Sepeda::with('kategori')->where('kategori_id', 1)->get();
        $fixie = Sepeda::with('kategori')->where('kategori_id', 2)->get();
        $roadbike = Sepeda::with('kategori')->where('kategori_id', 4)->get();
        $seli = Sepeda::with('kategori')->where('kategori_id', 3)->get();

        return view('customer.product', compact('mtb', 'fixie', 'roadbike', 'seli'));

    }

    public function detail($idproduct){
        $product = Sepeda::with('kategori')->where('id_sepeda', $idproduct)->first();
        $paket =  Paket::get();
        return view('customer.detail', compact('product', 'paket'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
