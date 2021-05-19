<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
