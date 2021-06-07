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
        $semuaPaket = Paket::get();
        $hitungSemuaPaket = count($semuaPaket);
        

        $request->validate([
            'paket_id' => 'nullable',
            'sepeda_id' => 'nullable',
        ]);

        if(!empty($request->get('username'))){
            $username = $request->get('username');
            $findUser = User::where('username', $username)->value('username');
            if($findUser){
                $findIdUser = User::where('username', $username)->value('id_pengguna');
                // dd($sepeda);
                $request->validate([
                    'paket_id' => 'nullable',
                    'tanggal' => 'nullable',
                    'jam' => 'nullable'
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
                $penyewaan->denda = 0;
                $penyewaan->total_biaya = 0;
                $penyewaan->save();
                $total = 0;
                
                $sepeda_id = $request->get('sepeda_id'); 
                foreach($sepeda_id as $arr){
                    foreach($arr as $id_paket => $id_sepeda){
                        $detailPenyewaan = new DetailPenyewaan;
                        $detailPenyewaan->penyewaan()->associate($no_nota);
                        $sepeda = new Sepeda;
                        $sepeda->id_sepeda = $id_sepeda;
                        $detailPenyewaan->sepeda()->associate($sepeda);
                        $paket= new Paket;
                        $paket->id_paket = $id_paket;
                        $detailPenyewaan->paket()->associate($paket);
                        $detailPenyewaan->tanggal = $request->get('tanggal');
                        $detailPenyewaan->status_penyewaan = 0;
                        $detailPenyewaan->save();

                        // Find Price per Paket
                        $paketPrice = Paket::where('id_paket', $id_paket)->value('harga');
                        $total += $paketPrice;
                        }
                    }
                $penyewaan->total_biaya = $total;   
                $penyewaan->save();  

            }
        
         }
        
         else{
            return redirect()->route('penyewaan.index')
               ->with('fail', 'Username tidak boleh kosong');
         }
        
   }
            
        
    public function updateStatus(Request $request, $idpenyewaan){
        $pembayaran = $request->get('pembayaran');
        $pengembalian = $request->get('pengembalian');
        $jaminan = $request->get('jaminan');

        $penyewaan = Penyewaan::where('id_penyewaan', $idpenyewaan)->first();
        $findNoNota = Penyewaan::where('id_penyewaan', $idpenyewaan)->value('no_nota');
        $detailPenyewaan = DetailPenyewaan::where('nota_no', $findNoNota)->get();
        if($pembayaran){
            $penyewaan->status_pembayaran = $pembayaran;
            $penyewaan->save();
        }
        else if($pengembalian){
            $penyewaan->status_pengembalian = $pengembalian;
            foreach($detailPenyewaan as $dp){
                $dp->status_penyewaan = $pengembalian;
                $dp->save();
            }
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
        $no_nota = "GM" . "-" . $this->random_strings(3);
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
        $str_result = '0123456789';
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
