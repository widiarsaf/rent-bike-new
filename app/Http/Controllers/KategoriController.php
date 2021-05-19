<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Kategori;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::get();
        return view('kategori.index', compact('kategori'));
    }

    public function create($id)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            ]);

        Kategori::create($request->all());
        // if the data is added successfully, will return to the main page
        return redirect()->route('kategori.index')
            ->with('success', 'Kategori telah ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {

        $kategori = Kategori::findOrFail($request->id_kategori);
        $kategori->update($request->all());
        return back();
    }

    public function destroy(Request $request)
    {
        $kategori = Kategori::findOrFail($request->id_kategori);
        $kategori->delete();
        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
