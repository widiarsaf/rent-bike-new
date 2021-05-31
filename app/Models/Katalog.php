<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sepeda;

class Katalog extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_katalog';
    protected $table = 'katalog';
    protected $fillable = [
        'id_katalog',
        'nama_katalog',
        'deskripsi_katalog'
    ];

    public function sepeda() {
        return $this->hasMany(Sepeda::class, 'id_katalog');
    }
}