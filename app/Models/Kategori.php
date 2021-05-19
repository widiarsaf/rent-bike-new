<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sepeda;

class Kategori extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kategori';
    protected $table = 'kategori';
    protected $fillable = [
        'id_kategori',
        'nama_kategori',
    ];

    public function sepeda() {
        return $this->hasMany(Sepeda::class, 'id_kategori');
    }
}

