<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    protected $fillable = [
        'pengguna_id',
        'session_id',
        'layanan_id',
        'lokasi_layanan_id',
        'jumlah',
        'harga_layanan',
        'biaya_jarak',
        'subtotal',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(LokasiLayanan::class, 'lokasi_layanan_id');
    }
}
