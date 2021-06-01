<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penyewaan;

class Pembayaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pembayaran';
    protected $table = 'pembayaran';
    protected $fillable = [
        'nota_no',
        'nama_pengirim',
        'tanggal_bayar',
        'foto_bukti',
        'keterangan',
        'nominal',
        'metode',
    ];

    public function penyewaan() {
        return $this->belongsTo(penyewaan::class, 'nota_no');
    }





}
