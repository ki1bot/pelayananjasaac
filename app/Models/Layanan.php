<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga_dasar',
        'icon',
        'status',
    ];

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'layanan_id');
    }
}
