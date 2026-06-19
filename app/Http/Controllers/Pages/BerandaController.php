<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\GrafikBeranda;
use App\Models\Layanan;

class BerandaController extends Controller
{
    public function index()
    {
        $layanan = Layanan::where('status', 'aktif')
            ->orderBy('harga_dasar')
            ->get();

        $grafik = $layanan->map(function ($item) {
            return [
                'nama' => $item->nama,
                'harga' => $item->harga_dasar,
            ];
        });

        return view('pages.beranda', compact('layanan', 'grafik'));
    }
}
