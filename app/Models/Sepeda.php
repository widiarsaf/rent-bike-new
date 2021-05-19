<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Sepeda extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sepeda';
    protected $table = 'sepeda';
    protected $fillable = [
        'unit_code',
        'kategori_id',
        'deskripsi',
        'foto_unit',
        'status',
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
