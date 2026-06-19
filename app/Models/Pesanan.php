<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    public const STATUS_DRAFT = 'draft';
    public const STATUS_SEDANG_DITINJAU = 'sedang_ditinjau';
    public const STATUS_DIPROSES = 'diproses';
    public const STATUS_SELESAI = 'selesai';
    public const STATUS_DIBATALKAN = 'dibatalkan';

    protected $fillable = [
        'pengguna_id',
        'kode_pesanan',
        'status',
        'total',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pesanan_id');
    }

    public function bisaDiubahOlehPelanggan(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function hitungUlangTotal(): void
    {
        $this->update([
            'total' => $this->detail()->sum('subtotal'),
        ]);
    }
}
