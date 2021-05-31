<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Katalog;


class KatalogController extends Controller
{
   

    public function index()
    {
        $katalog = Katalog::get();
        return view('admin.katalogIndex', compact('katalog'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama_katalog' => 'required',
            'deskripsi_katalog' => 'required'
            ]);

        Katalog::create($request->all());
        return redirect()->route('katalog.index')
            ->with('success', 'Katalog telah ditambahkan');
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
        $katalog = Katalog::findOrFail($request->id_katalog);
        $katalog->update($request->all());
        return back();
    }

    
    public function destroy(Request $request)
    {
        $katalog = Katalog::findOrFail($request->id_katalog);
        $katalog->delete();
        return redirect()->route('katalog.index')
            ->with('success', 'Katalog berhasil dihapus');
    
    }
}
