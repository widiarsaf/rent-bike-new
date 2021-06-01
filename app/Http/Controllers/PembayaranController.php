<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Penyewaan;


class PembayaranController extends Controller
{
    
    public function index()
    {
        $pembayaran = Pembayaran::with('penyewaan')->get();
        return view('admin.pembayaranIndex', compact('pembayaran'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nota_no' => 'required',
        ]);
        
        if(!empty($request->get('nota_no'))){
            $nota_no= $request->get('nota_no');
            $findPenyewaan = Penyewaan::where('no_nota', $nota_no)->value('no_nota');
            if($findPenyewaan){
                $request->validate([
                    'nama_pengirim' => 'required',
                    'tanggal_bayar' => 'required',
                    'keterangan' => 'required',
                    'nominal' => 'required',
                    'metode' => 'required',
                    'foto_bukti' => 'nullable',
                ]);

                $pembayaran = new Pembayaran;
                if ($request->file('foto_bukti')) {
                    $image_name = $request->file('foto_bukti')->store('images', 'public');
                    $pembayaran ->foto_bukti = $image_name;
                }

                $pembayaran->nama_pengirim = $request->get('nama_pengirim');
                $pembayaran->tanggal_bayar = $request->get('tanggal_bayar');
                $pembayaran->keterangan = $request->get('keterangan');
                $pembayaran->nominal = $request->get('nominal');
                $pembayaran->metode = $request->get('metode');
                
                $penyewaan = new Penyewaan;
                $penyewaan->no_nota = $nota_no;
                // dd($penyewaan);
                $pembayaran->penyewaan()->associate($nota_no);
                $pembayaran->save();


            }else{
                return redirect()->route('pembayaran.index')
                ->with('fail', 'nomor nota tidak ditemukan');
            }
        }
        
        else{
            return redirect()->route('pembayaran.index')
                ->with('fail', 'No nota tidak boleh kosong');
        }
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

