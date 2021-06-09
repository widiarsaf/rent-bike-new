<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepeda;
use App\Models\Kategori;
use App\Models\Katalog;
use App\Models\Paket;
use Illuminate\Support\Facades\Storage;

class SepedaController extends Controller
{

    public function index()
    {
        $sepeda = Sepeda::with('kategori')->get();
        $paket = Paket::all();
        $kategori = Kategori::all();
        $katalog = Katalog::all();
        return view('admin.sepedaIndex', compact('sepeda', 'paket', 'kategori', 'katalog'));
    }

    public function sepedaCustomer(){
         $sepeda = Sepeda::with('kategori')->with('katalog')->get();
         return view('customer.katalog', compact('sepeda'));
    }

    public function sepedaCustomerDetail($idSepeda){
         $sepeda = Sepeda::with('kategori')->with('katalog')->where('id_sepeda', $idSepeda)->first();
         return view('customer.detailSepeda', compact('sepeda'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_code' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'foto_unit' => 'nullable',
            'katalog_id' => 'required',
        ]);
        $sepeda = new Sepeda;
        if ($request->file('foto_unit')) {
            $image_name = $request->file('foto_unit')->store('images', 'public');
            $sepeda->foto_unit = $image_name;
        }

        $sepeda->unit_code = $request->get('unit_code');
        $sepeda->deskripsi = $request->get('deskripsi');
        $kategori = new Kategori;
        $kategori->id_kategori = $request->get('kategori_id');
        $katalog = new Katalog;
        $katalog->id_katalog = $request->get('katalog_id');

        $sepeda->kategori()->associate($kategori);
        $sepeda->katalog()->associate($katalog);
        $sepeda->save();


        return redirect()->route('sepeda.index')
            ->with('success', 'Sepeda berhasil ditambahkan');
    }

    public function show($id)
    {

    }

    public function edit($id_sepeda)
    {
        $sepeda = Sepeda::with('kategori')
            ->where('id_sepeda', $id_sepeda)
            ->first();
        $kategori = Kategori::all();
        $katalog = Katalog::all();
        return view('admin.sepedaEdit', ['sepeda' => $sepeda, 'kategori' => $kategori, 'katalog' => $katalog]);
    }
    public function update(Request $request, $id_sepeda)
    {
        $request->validate([
            'unit_code' => 'nullable',
            'kategori_id' => 'nullable',
            'deskripsi' => 'nullable',
            'foto_unit' => 'nullable',
            'katalog_id' => 'nullable',
        ]);

        $sepeda = Sepeda::with('kategori')
            ->where('id_sepeda', $id_sepeda)
            ->first();

        if ($request->file('foto_unit')) {
            if($sepeda->foto_unit && file_exists(storage_path('app/public/' . $sepeda->foto_unit))) {
                if($sepeda->foto_unit !== 'images/sepedaDefault.jpg'){
                    Storage::delete('public/' . $sepeda->foto_unit);
                    $image_name = $request->file('foto_unit')->store('images', 'public');
                    $sepeda->foto_unit = $image_name;
                }
                else{
                    $image_name = $request->file('foto_unit')->store('images', 'public');
                    $sepeda->foto_unit = $image_name;
                }
            }
        }
       
        $sepeda->unit_code = $request->get('unit_code');
        $sepeda->deskripsi = $request->get('deskripsi');

        $kategori = new Kategori;
        $kategori->id_kategori = $request->get('kategori_id');
        $katalog = new Katalog;
        $katalog->id_katalog = $request->get('katalog_id');

        $sepeda->kategori()->associate($kategori);
        $sepeda->katalog()->associate($katalog);
        $sepeda->save();


        return redirect()->route('sepeda.index')
            ->with('success', 'Sepeda berhasil diperbarui');


    }
    public function destroy($id_sepeda)
    {
        $sepeda = Sepeda::with('kategori')
            ->where('id_sepeda', $id_sepeda)
            ->first();
        if($sepeda->foto_unit && file_exists(storage_path('app/public/' . $sepeda->foto_unit))) {
            if($sepeda->foto_unit !== 'images/sepedaDefault.jpg'){
                Storage::delete('public/' . $sepeda->foto_unit);
            }
        }
        Sepeda::find($id_sepeda)->delete();

        return redirect()->route('sepeda.index')
            ->with('success', 'Sepeda berhasil dihapus');
    }
}
