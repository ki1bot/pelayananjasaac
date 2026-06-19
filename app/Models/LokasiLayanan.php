<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiLayanan extends Model
{
    protected $table = 'lokasi_layanan';

    protected $fillable = [
        'kota',
        'jarak_km',
        'status',
    ];
}
