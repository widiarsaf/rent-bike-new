<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;
use Response;

class FullCalendarController extends Controller
{
   
    public function index(Request $request)
    {

      $tanggal = $request->tanggal;
        $penyewaan = Penyewaan::where('tanggal',$request->tanggal)->get();
        return view('admin.calendarIndex', compact('penyewaan', $penyewaan));
        
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show(Request $request)
    {   
        // $tanggal = $request->tanggal;
        // $penyewaan = Penyewaan::where('tanggal',$request->tanggal)->get();
        // return view('admin.calendarIndex', compact('penyewaan', $penyewaan));
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
