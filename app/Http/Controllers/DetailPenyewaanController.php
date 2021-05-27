<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenyewaan;

class DetailPenyewaanController extends Controller
{
   
    public function index(Request $request)
    {
        $fromdate = $request->get('from-date');
        $todate = $request->get('to-date');

        if($fromdate && $todate){
            $detailpenyewaan = DetailPenyewaan::whereBetween('tanggal', [$fromdate, $todate])->get();
        }

        else if ($fromdate){
           $detailpenyewaan = DetailPenyewaan::whereDate('tanggal', '=', $fromdate)->get();
        }

        else{

            $detailpenyewaan = DetailPenyewaan::get();
        }

        return view ('admin.dataRekap', compact('detailpenyewaan', $detailpenyewaan));
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
