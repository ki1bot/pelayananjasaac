<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrafikBeranda extends Model
{
    protected $table = 'grafik_beranda';

    protected $fillable = [
        'nama_produk',
        'jumlah_pesanan',
    ];
}
