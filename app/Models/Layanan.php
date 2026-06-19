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
        'wajib_merk',
    ];

    protected $casts = [
        'wajib_merk' => 'boolean',
    ];

    public function tarifJarak()
    {
        return $this->hasMany(TarifJarakLayanan::class, 'layanan_id');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'layanan_id');
    }
}
