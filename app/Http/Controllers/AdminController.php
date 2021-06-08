<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Hash;

class AdminController extends Controller
{
    
    public function index()
    {
        $admin = User::where('is_admin', 1)->get();
        $password = " ";
        foreach($admin as $adm){

            $password = bcrypt($adm->password);
        }
        return view ('admin.adminIndex', compact('admin', 'password'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'no_telp' => 'required',
            'foto_profil' => 'nullable',
        ]);

        $admin = new User;
        if ($request->file('foto_profil')) {
            $image_name = $request->file('foto_profil')->store('images', 'public');
            $admin->foto_profil = $image_name;
        }

        $admin->nama = $request->get('nama');
        $admin->username = $request->get('username');
        $admin->email = $request->get('email');
        $admin->password = Hash::make($request->get('password'));
        $admin->no_telp = $request->get('no_telp');
        $admin->is_admin = 1;
        $admin->save();

        return redirect()->route('daftarAdmin.index')
            ->with('success', 'Admin berhasil ditambahkan');
    }


    

    
    public function show($id)
    {
        //
    }

   
    public function edit($idadmin)
    {
         $admin = User::where('id_pengguna', $idadmin)
            ->first();
         return view('admin.adminEdit', ['admin' => $admin]);
    }

    
    public function update(Request $request, $idadmin)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'no_telp' => 'required',
            'foto_profil' => 'nullable',
        ]);
         $admin = User::where('id_pengguna', $idadmin)
            ->first();

        if ($request->file('foto_profil')) {
            if($admin->foto_profil && file_exists(storage_path('app/public/' . $admin->foto_profil))) {
                if($admin->foto_profil !== 'images/userDefault.png'){
                    Storage::delete('public/' . $admin->foto_profil);
                    $image_name = $request->file('foto_profil')->store('images', 'public');
                    $admin->foto_profil = $image_name;
                }
                else{
                    $image_name = $request->file('foto_profil')->store('images', 'public');
                    $admin->foto_profil = $image_name;
                }
            }
        }

        $admin->nama = $request->get('nama');
        $admin->username = $request->get('username');
        $admin->email = $request->get('email');
        $admin->password = Hash::make($request->get('password'));
        $admin->no_telp = $request->get('no_telp');
        $admin->is_admin = 1;
        $admin->save();

        return redirect()->route('daftarAdmin.index')
            ->with('success', 'Admin berhasil diupdate');

    }

    
    public function destroy($idadmin)
    {
        $admin = User::where('id_pengguna', $idadmin)
            ->first();
        if($admin->foto_profil && file_exists(storage_path('app/public/' . $admin->foto_profil))) {
             if($admin->foto_profil !== 'images/userDefault.png'){
                Storage::delete('public/' . $admin->foto_profil);
             }
        }
        User::find($idadmin)->delete();
        return redirect()->route('daftarAdmin.index')
            ->with('success', 'Admin berhasil dihapus');

    }
}
