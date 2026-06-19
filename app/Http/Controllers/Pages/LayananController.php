<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\MerkAc;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::with(['tarifJarak.lokasi'])
            ->where('status', 'aktif')
            ->orderBy('harga_dasar')
            ->get();

        $merkAc = MerkAc::where('status', 'aktif')->orderBy('nama')->get();

        return view('pages.layanan', compact('layanan', 'merkAc'));
    }
}
