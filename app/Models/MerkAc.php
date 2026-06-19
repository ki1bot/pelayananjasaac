<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerkAc extends Model
{
    protected $table = 'merk_ac';

    protected $fillable = [
        'nama',
        'status',
    ];

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'merk_ac_id');
    }
}
