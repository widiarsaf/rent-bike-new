<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;
use Response;
use Carbon\Carbon;

class FullCalendarController extends Controller
{
   
    public function index(Request $request)
    {

      $tanggal = $request->tanggal;
      if($tanggal){

          $penyewaan = Penyewaan::with('user')->where('tanggal',$request->tanggal)->get();
          $selectDate = $tanggal;
          
      }
      else{
          $today = Carbon::now()->toDateString();
          $penyewaan = Penyewaan::with('user')->where('tanggal',$today)->get();
          $selectDate = $today;
      }
        
      return view('admin.calendarIndex', compact('penyewaan', 'selectDate'));



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
