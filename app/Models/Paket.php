<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penyewaan;

class Paket extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_paket';
    protected $table = 'paket';
    protected $fillable = [
        'id_paket',
        'nama_paket',
        'jam',
        'harga'
    ];

    public function penyewaan() {
        return $this->hasMany(Penyewaan::class, 'id_paket');
    }
}
