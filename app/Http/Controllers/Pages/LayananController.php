<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\LokasiLayanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::where('status', 'aktif')->get();
        $lokasi = LokasiLayanan::where('status', 'aktif')->orderBy('jarak_km')->get();
        $biayaPerKm = (int) env('BIAYA_PER_KM', 2500);

        return view('pages.layanan', compact('layanan', 'lokasi', 'biayaPerKm'));
    }
}
