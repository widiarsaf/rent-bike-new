<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Paket;

class PaketController extends Controller
{

    public function index()
    {
        $paket = Paket::get();
        return view('admin.paketIndex', compact('paket'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'jam' => 'required',
            'harga' => 'required'
            ]);

        Paket::create($request->all());
        // if the data is added successfully, will return to the main page
        return redirect()->route('paket.index')
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
        $paket = Paket::findOrFail($request->id_paket);
        $paket->update($request->all());
        return back();
    }

    public function destroy(Request $request)
    {
        $paket = Paket::findOrFail($request->id_paket);
        $paket->delete();
        return redirect()->route('paket.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
