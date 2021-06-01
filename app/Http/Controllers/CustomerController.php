<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    
    public function index()
    {
        $customer = User::where('is_admin', 0)->get();
        $password = " ";
        foreach($customer as $cst){

            $password = bcrypt($cst->password);
        }
        return view ('admin.customerIndex', compact('customer', 'password'));
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

    
    public function destroy($idcustomer)
    {
        $customer = User::where('id_pengguna', $idcustomer)
            ->first();
        if($customer->foto_profil && file_exists(storage_path('app/public/' . $customer->foto_profil))) {
             Storage::delete('public/' . $customer->foto_profil);
        }
        User::find($idcustomer)->delete();
        return redirect()->route('daftarCustomer.index')
            ->with('success', 'Customer berhasil dihapus');
    }
}
