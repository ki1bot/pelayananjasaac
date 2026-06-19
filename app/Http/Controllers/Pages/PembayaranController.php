<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::with(['layanan', 'lokasi'])
            ->where('pengguna_id', Auth::id())
            ->latest()
            ->get();

        $total = $keranjang->sum('subtotal');

        $metode = [
            'QRIS',
            'Transfer Bank',
            'GoPay',
            'DANA',
            'ShopeePay',
            'OVO',
            'LinkAja',
        ];

        return view('pages.pembayaran', compact('keranjang', 'total', 'metode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'metode' => ['required', 'string'],
        ]);

        $keranjang = Keranjang::where('pengguna_id', Auth::id())->get();
        $total = $keranjang->sum('subtotal');

        if ($total <= 0) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang masih kosong.');
        }

        Pembayaran::create([
            'pengguna_id' => Auth::id(),
            'kode_pembayaran' => 'PAY-' . strtoupper(Str::random(10)),
            'metode' => $request->metode,
            'total' => $total,
            'status' => 'menunggu',
        ]);

        Keranjang::where('pengguna_id', Auth::id())->delete();

        return redirect()->route('beranda')->with('success', 'Pembayaran berhasil dibuat dan sedang menunggu konfirmasi.');
    }
}
