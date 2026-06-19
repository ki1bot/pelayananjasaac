<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class PesananAdminController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with(['pengguna', 'pembayaran'])
            ->where('status', '!=', Pesanan::STATUS_DRAFT)
            ->latest()
            ->get();

        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function show(Pesanan $pesanan)
    {
        $pesanan->load([
            'pengguna',
            'pembayaran',
            'detail.layanan',
            'detail.merkAc',
            'detail.tarifJarak.lokasi',
        ]);

        return view('admin.pesanan.detail', compact('pesanan'));
    }

    public function proses(Pesanan $pesanan)
    {
        if ($pesanan->status !== Pesanan::STATUS_SEDANG_DITINJAU) {
            return back()->with('error', 'Pesanan hanya bisa diproses dari status sedang ditinjau.');
        }

        $pesanan->update([
            'status' => Pesanan::STATUS_DIPROSES,
        ]);

        return back()->with('success', 'Pesanan berhasil diproses.');
    }

    public function selesai(Pesanan $pesanan)
    {
        if ($pesanan->status !== Pesanan::STATUS_DIPROSES) {
            return back()->with('error', 'Pesanan hanya bisa diselesaikan dari status diproses.');
        }

        $pesanan->update([
            'status' => Pesanan::STATUS_SELESAI,
        ]);

        return back()->with('success', 'Pesanan berhasil diselesaikan.');
    }
}
