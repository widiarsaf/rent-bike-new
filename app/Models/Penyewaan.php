<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DetailPenyewaan;



class Penyewaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_penyewaan';
    protected $table = 'penyewaan';
    protected $fillable = [
        'no_nota',
        'status_pembayaran',
        'status_pengembalian',
        'status_jaminan',
        'total_biaya',
        'tanggal',
        'pengguna_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'pengguna_id');
    }

    public function detailPenyewaan() {
        return $this->hasMany(DetailPenyewaan::class, 'no_nota');
    }
}
