<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Layanan;
use App\Models\LokasiLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index(Request $request)
    {
        $keranjang = $this->queryKeranjang($request)->with(['layanan', 'lokasi'])->latest()->get();
        $total = $keranjang->sum('subtotal');

        return view('pages.keranjang', compact('keranjang', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => ['required', 'exists:layanan,id'],
            'lokasi_layanan_id' => ['required', 'exists:lokasi_layanan,id'],
            'jumlah' => ['required', 'integer', 'min:1'],
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);
        $lokasi = LokasiLayanan::findOrFail($request->lokasi_layanan_id);

        $jumlah = (int) $request->jumlah;
        $biayaPerKm = (int) env('BIAYA_PER_KM', 2500);
        $hargaLayanan = (int) $layanan->harga_dasar;
        $biayaJarak = (int) $lokasi->jarak_km * $biayaPerKm;
        $subtotal = ($hargaLayanan + $biayaJarak) * $jumlah;

        Keranjang::create([
            'pengguna_id' => Auth::id(),
            'session_id' => $request->session()->getId(),
            'layanan_id' => $layanan->id,
            'lokasi_layanan_id' => $lokasi->id,
            'jumlah' => $jumlah,
            'harga_layanan' => $hargaLayanan,
            'biaya_jarak' => $biayaJarak,
            'subtotal' => $subtotal,
        ]);

        return redirect()->route('keranjang.index')->with('success', 'Layanan berhasil ditambahkan ke keranjang.');
    }

    public function destroy(Request $request, Keranjang $keranjang)
    {
        $bolehHapus = Auth::check()
            ? $keranjang->pengguna_id === Auth::id()
            : $keranjang->session_id === $request->session()->getId();

        abort_unless($bolehHapus, 403);

        $keranjang->delete();

        return back()->with('success', 'Item berhasil dihapus.');
    }

    private function queryKeranjang(Request $request)
    {
        return Keranjang::query()
            ->when(Auth::check(), fn ($query) => $query->where('pengguna_id', Auth::id()))
            ->when(! Auth::check(), fn ($query) => $query->where('session_id', $request->session()->getId()));
    }
}
