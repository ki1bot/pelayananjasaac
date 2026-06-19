<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TarifJarakLayanan extends Model
{
    protected $table = 'tarif_jarak_layanan';

    protected $fillable = [
        'layanan_id',
        'lokasi_layanan_id',
        'harga_jarak',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(LokasiLayanan::class, 'lokasi_layanan_id');
    }
}
