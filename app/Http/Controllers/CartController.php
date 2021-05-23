<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepeda;
use App\Models\Kategori;
use App\Models\Cart;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    
    public function index()
    {
        $user = Auth::user()->id_pengguna;
        $cart = Cart::all()->where('pengguna_id', $user);
        $cart2= Cart::all()->where('pengguna_id', $user);
        $totalprice = $cart->count('paket_id');
        return view('customer.cart', ['cart' => $cart,'cart2' => $cart2, 'totalprice'=>$totalprice]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'sepeda_id'=>'required',
            'pengguna_id'=>'required',
            'paket_id'=>'required',
        ]);

        $cart = new Cart;
        $user = new User;
        $user->id_pengguna = $request->get('pengguna_id');
        $cart->user()->associate($user);

        $sepeda = new Sepeda;
        $sepeda->id_sepeda = $request->get('sepeda_id');
        $cart->sepeda()->associate($sepeda);

        $paket= new Paket;
        $paket->id_paket = $request->get('paket_id');
        $cart->paket()->associate($paket);

        $cart->save();
        // dd($cart);
        return redirect()->route('cart.index')
            ->with('success', 'Success Add to Cart');
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
