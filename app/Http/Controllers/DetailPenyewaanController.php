<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenyewaan;
use Excel;
use App\Exports\DataRekapExport;
use Carbon\Carbon;

class DetailPenyewaanController extends Controller
{
   
    public function index(Request $request)
    {
        $fromdate = $request->get('from-date');
        $todate = $request->get('to-date');
        $from_date2 = " ";
        $to_date2 = " ";
        $detailpenyewaan = " "; 

        if($fromdate && $todate){
            $detailpenyewaan = DetailPenyewaan::whereBetween('tanggal', [$fromdate, $todate])->get();
            $from_date2 = $fromdate;
            $to_date2 = $todate;
        }

        else if ($fromdate){
           $detailpenyewaan = DetailPenyewaan::whereDate('tanggal', '=', $fromdate)->get();
           $from_date2 = $fromdate;
        }

        else{

            $detailpenyewaan = DetailPenyewaan::get();
        }

        return view ('admin.dataRekap', compact('detailpenyewaan', 'from_date2', 'to_date2'));
    }

    public function export_excel(Request $request){

        $fromdate = $request->get('from-date2');
        $todate = $request->get('to-date2');

        if($fromdate && $todate){
            $detailpenyewaan = DetailPenyewaan::whereBetween('tanggal', [$fromdate, $todate])->get();
            $nama_file = 'datarekap_mingguan '.$fromdate . "__" .$todate.'.xlsx';
        }

        else if ($fromdate){
           $detailpenyewaan = DetailPenyewaan::whereDate('tanggal', '=', $fromdate)->get();
           $nama_file = 'datarekap_mingguan '. "tanggal " .$fromdate.'.xlsx';
        }

        else{
            $detailpenyewaan = DetailPenyewaan::get();
            $nama_file = 'datarekap '. date('Y-m-d') . '.xlsx';
        }

        return Excel::download(new DataRekapExport($detailpenyewaan), $nama_file);
    }

    
    public function create()
    {
        
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
