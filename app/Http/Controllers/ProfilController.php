<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilController extends Controller
{

    public function index()
    {
        // 
    }

    public function getAdmin($id)
    {
        $user = User::where('id_pengguna', $id);
        $adminRole = $user = User::where('id_pengguna', $id)->value('is_admin');
        // dd($adminRole);

        if($adminRole == 1){

            return view('admin.profile', compact('user'));
        }
        else{
            return view('customer.profile', compact('user'));
        }
    }

    public function updateBio(Request $request, $iduser)
    {
        $request->validate([
            'nama' => 'nullable',
            'email' => 'nullable',
            'no_telp' => 'nullable',
            'username' => 'nullable'
        ]);
        $user = User::where('id_pengguna', $iduser)->first();
        if($request->file('foto_profil')){
            if ($user->foto_profil && file_exists(storage_path('app/public/'.$user->foto_profil))){
                if($user->foto_profil !== 'images/userDefault.png'){
                    Storage::delete('public/'.$user->foto_profil);
                    $image_name = $request->file('foto_profil')->store('images', 'public');
                    $user->foto_profil= $image_name;
                }else{
                    $image_name = $request->file('foto_profil')->store('images', 'public');
                    $user->foto_profil = $image_name;
                }

            }
        }
        $user->nama = $request->get('nama');
        $user->email = $request->get('email');
         $user->no_telp = $request->get('no_telp');
          $user->username = $request->get('username');
        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }
        $user->save();


            return redirect()->route('profileAdmin', $iduser)
                ->with('success', 'Profile success updated');
        
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
