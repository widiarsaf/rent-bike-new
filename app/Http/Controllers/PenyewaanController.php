<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;
use App\Models\Cart;
use App\Models\User;
use App\Models\Sepeda;
use App\Models\Paket;
use App\Models\DetailPenyewaan;
use Carbon\Carbon;

class PenyewaanController extends Controller
{
    
    public function index()
    {
        $penyewaan = Penyewaan::with('DetailPenyewaan')->get();
        return view ('admin.penyewaanIndex', compact('penyewaan', $penyewaan));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request )
    {
        $request->validate([
            'pengguna_id' => 'required',
            'total' => 'required',
            'sepeda_id' =>'required',
            'paket_id' => 'required',
            'tanggal' => 'required',
            'jam' => 'required'
        ]);

        $no_nota = 'GWSX'. "-". $this->random_strings(5);

        // Create Penyewaan
        $penyewaan = New Penyewaan;
        $user = New User;
        $user->id_pengguna = $request->get('pengguna_id');
        $penyewaan->user()->associate($user);
        $no_nota = 'GWSX'. "-". $this->random_strings(5);
        $penyewaan->no_nota = $no_nota;
        $penyewaan->total_biaya = $request->get('total');
        $penyewaan->tanggal = $request->get('tanggal');
        $penyewaan->jam = $request->get('jam');
        $penyewaan->save();

        // Create New Detail Penyewaan
        $spd = $request->get('sepeda_id');
        $pkt = $request->get('paket_id');
        $data = [];
        for($i = 0; $i < count($spd); $i++){
            $detailPenyewaan = new DetailPenyewaan;
            $detailPenyewaan->penyewaan()->associate($no_nota);
            $sepeda = new Sepeda;
            $sepeda->id_sepeda = $spd[$i];
            $findSepeda = Sepeda::where('id_sepeda', $spd[$i])->first();
            $findSepeda->status = 1;
            $detailPenyewaan->sepeda()->associate($sepeda);
            $paket= new Paket;
            $paket->id_paket = $pkt[$i];
            $detailPenyewaan->paket()->associate($paket);
            $findSepeda->save();
            $detailPenyewaan->save();
            
        }
        // Delete Cart
        $pengguna_id = $request->get('pengguna_id');
        $cart = Cart::where('pengguna_id', $pengguna_id)->get();
        $cart->each->delete();

    }


    public function random_strings($length_of_string)
    {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        // Shufle the $str_result and returns substring
        // of specified length
        return substr(
            str_shuffle($str_result),
            0,
            $length_of_string
        );
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
