<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Katalog;

class Sepeda extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sepeda';
    protected $table = 'sepeda';
    protected $fillable = [
        'unit_code',
        'kategori_id',
        'katalog_id',
        'deskripsi',
        'foto_unit',
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function katalog() {
        return $this->belongsTo(Katalog::class, 'katalog_id');
    }
}
