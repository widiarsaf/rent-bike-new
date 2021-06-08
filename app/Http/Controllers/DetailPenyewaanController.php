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
            $detailpenyewaan = DetailPenyewaan::where('status_penyewaan', 1)->whereBetween('tanggal', [$fromdate, $todate])->whereNotNull('nota_no')->get();
            $from_date2 = $fromdate;
            $to_date2 = $todate;
        }

        else if ($fromdate){
           $detailpenyewaan = DetailPenyewaan::where('status_penyewaan', 1)->whereDate('tanggal', '=', $fromdate)->whereNotNull('nota_no')->get();
           $from_date2 = $fromdate;
           $to_date2 = "null";
        }

        else{

            $detailpenyewaan = DetailPenyewaan::where('status_penyewaan', 1)->whereNotNull('nota_no')->get();
            $from_date2 = "null" ;
            $to_date2 = "null";
        }

        return view ('admin.dataRekap', compact('detailpenyewaan', 'from_date2', 'to_date2'));
    }

    public function export_excel(Request $request){

        $fromdate = $request->get('from-date2');
        $todate = $request->get('to-date2');

        if($fromdate !== "null" &&  $todate !== "null"){
            $detailpenyewaan = DetailPenyewaan::whereBetween('tanggal', [$fromdate, $todate])->whereNotNull('nota_no')->get();
            $nama_file = 'datarekap dari '.$fromdate . " sampai " .$todate.'.xlsx';
        }

        else if ($fromdate !== "null" &&  $todate === "null"){
           $detailpenyewaan = DetailPenyewaan::whereDate('tanggal', '=', $fromdate)->whereNotNull('nota_no')->get();
           $nama_file = 'datarekap pada tanggal ' .$fromdate.'.xlsx';
        }

        else{
            $detailpenyewaan = DetailPenyewaan::whereNotNull('nota_no')->get();
            $nama_file = 'datarekap_semua diexport_tanggal '. date('Y-m-d') . '.xlsx';
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
