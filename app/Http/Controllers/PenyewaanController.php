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
        $penyewaan = Penyewaan::with('DetailPenyewaan')->with('paket')->get();
        $sepeda = Sepeda::all();
        $paket = Paket::all();
        return view ('admin.penyewaanIndex', compact('penyewaan', 'sepeda', 'paket'));
    }

    
    public function create()
    {
        //
    }


    
    public function store(Request $request )
    {
        $request->validate([
            'username' => 'required',
            'sepeda_id' =>'required',
        ]);
        
        if(!empty($request->get('username'))){
            $username = $request->get('username');
            $findUser = User::where('username', $username)->value('username');
            if($findUser){
                $findIdUser = User::where('username', $username)->value('id_pengguna');
                $sepeda = $request->get('sepeda_id');
                // dd($sepeda);
                if (empty($sepeda)) {
                    return redirect()->route('penyewaan.index')
                        ->with('fail', 'pilih salah satu sepeda');
                }
                else{
                    $request->validate([
                        'paket_id' => 'required',
                        'tanggal' => 'required',
                        'jam' => 'required'
                    ]);

                    // Create Penyewaan
                    $penyewaan = New Penyewaan;
                    $user = New User;
                    $user->id_pengguna = $findIdUser;
                    $penyewaan->user()->associate($user);
                    $no_nota = $this->checkIfAva();
                    $penyewaan->no_nota = $no_nota;
                    $penyewaan->tanggal = $request->get('tanggal');
                    $penyewaan->jam = $request->get('jam');
                    $penyewaan->paket_id = $request->get('paket_id');

                    // find price
                    $paket = Paket::where('id_paket', $request->get('paket_id'))->first();
                    $paketprice = $paket->harga;
                    $total = count($sepeda) * $paketprice;

                    $penyewaan->total_biaya = $total;
                    $penyewaan->denda = 0;
                    $penyewaan->save();

                    // Create detail Penyewaan
                    $spd = $request->get('sepeda_id');
                    for($i = 0; $i < count($spd); $i++){
                        $detailPenyewaan = new DetailPenyewaan;
                        $detailPenyewaan->penyewaan()->associate($no_nota);
                        $sepeda = new Sepeda;
                        $sepeda->id_sepeda = $spd[$i];
                        $detailPenyewaan->sepeda()->associate($sepeda);
                        $paket= new Paket;
                        $paket->id_paket = $request->get('paket_id');
                        $detailPenyewaan->paket()->associate($paket);
                        $detailPenyewaan->tanggal = $request->get('tanggal');
                        $detailPenyewaan->save();

                    }
                    return redirect()->route('penyewaan.index')
                     ->with('success', 'Penyewaan berhasil diperbarui');
                   
                }

            }else{
                return redirect()->route('penyewaan.index')
                ->with('fail', 'Username tidak boleh ditemukan');
            }

        }

        else{
            return redirect()->route('penyewaan.index')
                ->with('fail', 'Username tidak boleh kosong');
        }


        // $sepeda = $request->get('sepeda_id');
        
        

        // $no_nota = $this->checkIfAva();

        // // Create Penyewaan
        // $penyewaan = New Penyewaan;
        // $user = New User;
        // $user->id_pengguna = $request->get('pengguna_id');
        // $penyewaan->user()->associate($user);
        // $no_nota = 'GWSX'. "-". $this->random_strings(5);
        // $penyewaan->no_nota = $no_nota;
        // $penyewaan->total_biaya = $request->get('total');
        // $penyewaan->tanggal = $request->get('tanggal');
        // $penyewaan->jam = $request->get('jam');
        // $penyewaan->save();

        // // Create New Detail Penyewaan
        // $spd = $request->get('sepeda_id');
        // $pkt = $request->get('paket_id');
        // $data = [];
        // for($i = 0; $i < count($spd); $i++){
            // $detailPenyewaan = new DetailPenyewaan;
            // $detailPenyewaan->penyewaan()->associate($no_nota);
            // $sepeda = new Sepeda;
            // $sepeda->id_sepeda = $spd[$i];
            // $findSepeda = Sepeda::where('id_sepeda', $spd[$i])->first();
            // $findSepeda->status = 1;
            // $detailPenyewaan->sepeda()->associate($sepeda);
            // $paket= new Paket;
            // $paket->id_paket = $pkt[$i];
            // $detailPenyewaan->paket()->associate($paket);
            // $detailPenyewaan->tanggal = $request->get('tanggal');
            // $findSepeda->save();
            // $detailPenyewaan->save();
        // }
        // // Delete Cart
        // $pengguna_id = $request->get('pengguna_id');
        // $cart = Cart::where('pengguna_id', $pengguna_id)->get();
        // $cart->each->delete();

        // return redirect()->route('penyewaan.index')
        //     ->with('success', 'Penyewaan berhasil diperbarui');

    }

    







    public function updateStatus(Request $request, $idpenyewaan){
        $pembayaran = $request->get('pembayaran');
        $pengembalian = $request->get('pengembalian');
        $jaminan = $request->get('jaminan');

        $penyewaan = Penyewaan::where('id_penyewaan', $idpenyewaan)->first();
        if($pembayaran){
            $penyewaan->status_pembayaran = $pembayaran;
            $penyewaan->save();
        }
        else if($pengembalian){
            $penyewaan->status_pengembalian = $pengembalian;
            $penyewaan->save();
        }
        else if($jaminan){
            $penyewaan->status_jaminan = $jaminan;
            $penyewaan->save();
        }

        else{
            // 
        }

        return redirect()->route('penyewaan.index')
            ->with('success', 'Penyewaan berhasil diperbarui');



    }


    public function checkIfAva()
    {
        $penyewaanList = Penyewaan::all();
        $no_nota = "RBX" . "-" . $this->random_strings(8);
        $isAva = True;
        for ($i = 0; $i < count($penyewaanList); $i++) {
            if ($penyewaanList[$i]->no_nota === $no_nota) {
                $isAva = False;
            } else {
                $isAva = True;
            }
        }
        if ($isAva) {
            return $no_nota;
        } else {
            $this->checkIfAva();
        }
        return $no_nota;
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
        $penyewaan = Penyewaan::with('paket')->with('user')->where('id_penyewaan', $id)->first();
        $detailPenyewaan = DetailPenyewaan::with('sepeda')->get();
        return view ('admin.detailPenyewaan', compact('penyewaan', 'detailPenyewaan'));

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
