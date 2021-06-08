<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
   
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeriIndex', compact('galeri'));
    }

   
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
            'foto' => 'nullable',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->file('foto')) {
            $image_name = $request->file('foto')->store('images', 'public');
            $galeri->foto = $image_name;
        }

        $galeri = new Galeri;
        $galeri->nama = $request->get('nama');
        $galeri->deskripsi = $request->get('deskripsi');
        $galeri->save();

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan');
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
    public function edit($id)
    {
        $galeri = Galeri::find($id);
        return view('admin.galeriEdit', ['galeri'=>$galeri]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $galeri = Galeri::find($id);

        if($request->get('foto')){
            if ($galeri->foto && file_exists(storage_path('app/public/'.$galeri->foto))){
                if($galeri->foto !== 'images/userDefault.png'){
                    Storage::delete('public/'.$galeri->foto);
                    $image_name = $request->file('foto')->store('images', 'public');
                    $galeri->foto = $image_name;
                else{
                    $image_name = $request->file('foto')->store('images', 'public');
                    $galeri->foto = $image_name;
                }

            }
        }

        $galeri->foto = $image_name;
        $galeri->nama = $request->nama;
        $galeri->deskripsi = $request->deskripsi;

        $galeri->save();
        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galeri::find($id)->first();
        if($galeri->foto !== 'images/userDefault.png'){
             Storage::delete('public/'.$galeri->foto);
        }
        $galeri->delete();
        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil dihapus');
    }
}
