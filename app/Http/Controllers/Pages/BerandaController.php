<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\GrafikBeranda;
use App\Models\Layanan;

class BerandaController extends Controller
{
    public function index()
    {
        $layanan = Layanan::where('status', 'aktif')->get();
        $grafik = GrafikBeranda::orderBy('jumlah_pesanan', 'desc')->get();

        return view('pages.beranda', compact('layanan', 'grafik'));
    }
}
