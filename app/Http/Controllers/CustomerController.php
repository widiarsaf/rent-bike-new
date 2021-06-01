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

    
    public function destroy($id)
    {
        //
    }
}
