<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pesan';
    protected $table = 'pesan';
    protected $fillable = [
        'judul_pesan',
        'foto_pesan',
        'deskripsi',
    ];
}
