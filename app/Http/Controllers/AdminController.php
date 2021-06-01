<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

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
