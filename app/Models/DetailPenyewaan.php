<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penyewaan;
use App\Models\Sepeda;
use App\Models\Paket;



class DetailPenyewaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_detailPenyewaan';
    protected $table = 'detailPenyewaan';
    protected $fillable = [
        'nota_no',
        'sepeda_id',
        'paket_id',
        'tanggal',
        'status_penyewaan'
    ];

    public function penyewaan() {
        return $this->belongsTo(penyewaan::class, 'nota_no');
    }

         public function sepeda() {
        return $this->belongsTo(Sepeda::class, 'sepeda_id');
    }

    public function paket() {
        return $this->belongsTo(Paket::class, 'paket_id');
    }




}
