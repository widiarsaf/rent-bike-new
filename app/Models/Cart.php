<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sepeda;
use App\Models\Paket;
use App\Models\User;

class Cart extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected $primaryKey = 'id';
    protected $fillable = [
        'pengguna_id',
        'sepeda_id',
        'paket_id'
    ];

     public function sepeda() {
        return $this->belongsTo(Sepeda::class, 'sepeda_id');
    }

    public function paket() {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'pengguna_id');
    }

}
