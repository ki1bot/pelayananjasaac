<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    public function index(Pesanan $pesanan)
    {
        $this->pastikanPemilik($pesanan);

        $pesanan->load(['detail.layanan', 'detail.merkAc', 'detail.tarifJarak.lokasi']);

        if (! $pesanan->bisaDiubahOlehPelanggan()) {
            return redirect()->route('pesanan.show', $pesanan)->with('error', 'Pesanan ini sudah masuk proses pembayaran.');
        }

        if ($pesanan->detail->isEmpty()) {
            return redirect()->route('pesanan.create')->with('error', 'Tambahkan detail pesanan terlebih dahulu.');
        }

        $metode = [
            'QRIS',
            'Transfer Bank',
            'GoPay',
            'DANA',
            'ShopeePay',
            'OVO',
            'LinkAja',
        ];

        return view('pages.pembayaran', compact('pesanan', 'metode'));
    }

    public function store(Request $request, Pesanan $pesanan)
    {
        $this->pastikanPemilik($pesanan);

        if (! $pesanan->bisaDiubahOlehPelanggan()) {
            return redirect()->route('pesanan.show', $pesanan)->with('error', 'Pesanan ini sudah tidak bisa dibayar ulang.');
        }

        $request->validate([
            'metode' => ['required', 'string', 'max:60'],
        ]);

        $pesanan->load('detail');

        if ($pesanan->detail->isEmpty()) {
            return redirect()->route('pesanan.create')->with('error', 'Tambahkan detail pesanan terlebih dahulu.');
        }

        $pesanan->hitungUlangTotal();

        Pembayaran::create([
            'pengguna_id' => Auth::id(),
            'pesanan_id' => $pesanan->id,
            'kode_pembayaran' => 'PAY-' . strtoupper(Str::random(10)),
            'metode' => $request->metode,
            'total' => $pesanan->fresh()->total,
            'status' => 'menunggu_konfirmasi',
        ]);

        $pesanan->update([
            'status' => Pesanan::STATUS_SEDANG_DITINJAU,
        ]);

        return redirect()->route('pesanan.show', $pesanan)->with('success', 'Pembayaran berhasil dibuat. Pesanan sedang ditinjau admin.');
    }

    private function pastikanPemilik(Pesanan $pesanan): void
    {
        abort_unless($pesanan->pengguna_id === Auth::id(), 403);
    }
}
