<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\DetailPenyewaan;

class DataRekapExport implements FromView
{
    
    private $detailpenyewaan;

    public function __construct($detailpenyewaan)
    {
        $this->detailpenyewaan = $detailpenyewaan;
    }
    
    public function view(): View
    {
        return view('admin.dataRekapTable', [
            'datas' =>  $this->detailpenyewaan
        ]);
    }

    
}
