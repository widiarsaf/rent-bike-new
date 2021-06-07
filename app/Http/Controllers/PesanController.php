<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use Illuminate\Support\Facades\Storage;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesan = Pesan::all();
        return view('admin.pesanIndex', compact('pesan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_pesan' => 'required',
            'foto_pesan' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->file('foto_pesan')) {
            $image_name = $request->file('foto_pesan')->store('images', 'public');
        }

        $pesan = new Pesan;
        $pesan->judul_pesan = $request->get('judul_pesan');
        $pesan->foto_pesan = $image_name;
        $pesan->deskripsi = $request->get('deskripsi');
        $pesan->save();

        return redirect()->route('pesan.index')
            ->with('success', 'Pesan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pesan)
    {
        $pesan = Pesan::find($id_pesan);
        return view('admin.pesanEdit', ['pesan'=>$pesan]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pesan)
    {
        $pesan = Pesan::find($id_pesan);

        $pesan->judul_pesan = $request->judul_pesan;
        
        if ($pesan->foto_pesan && file_exists(storage_path('app/public/'.$pesan->foto_pesan))){
            Storage::delete('public/'.$pesan->foto_pesan);
        }
        $image_name = $request->file('foto_pesan')->store('images', 'public');
        $pesan->foto_pesan = $image_name;
        $pesan->deskripsi = $request->deskripsi;

        $pesan->save();
        return redirect()->route('pesan.index')
            ->with('success', 'Pesan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pesan)
    {
        Pesan::find($id_pesan)->delete();
        return redirect()->route('pesan.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}
