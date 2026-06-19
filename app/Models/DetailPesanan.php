<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $table = 'detail_pesanan';

    protected $fillable = [
        'pesanan_id',
        'layanan_id',
        'merk_ac_id',
        'tarif_jarak_layanan_id',
        'jumlah',
        'harga_layanan',
        'harga_jarak',
        'subtotal',
        'catatan',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function merkAc()
    {
        return $this->belongsTo(MerkAc::class, 'merk_ac_id');
    }

    public function tarifJarak()
    {
        return $this->belongsTo(TarifJarakLayanan::class, 'tarif_jarak_layanan_id');
    }
}
