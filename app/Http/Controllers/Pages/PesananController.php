<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\DetailPesanan;
use App\Models\Layanan;
use App\Models\MerkAc;
use App\Models\Pesanan;
use App\Models\TarifJarakLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with(['detail.layanan', 'pembayaran'])
            ->where('pengguna_id', Auth::id())
            ->latest()
            ->get();

        return view('pages.pesanan.index', compact('pesanan'));
    }

    public function create()
    {
        $layanan = Layanan::with(['tarifJarak.lokasi'])
            ->where('status', 'aktif')
            ->orderBy('harga_dasar')
            ->get();

        $merkAc = MerkAc::where('status', 'aktif')->orderBy('nama')->get();

        return view('pages.pesanan.buat', compact('layanan', 'merkAc'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => ['required', 'exists:layanan,id'],
            'tarif_jarak_layanan_id' => ['required', 'exists:tarif_jarak_layanan,id'],
            'merk_ac_id' => ['nullable', 'exists:merk_ac,id'],
            'jumlah' => ['required', 'integer', 'min:1'],
            'catatan' => ['nullable', 'string', 'max:1000'],
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);
        $tarif = TarifJarakLayanan::where('id', $request->tarif_jarak_layanan_id)
            ->where('layanan_id', $layanan->id)
            ->firstOrFail();

        if ($layanan->wajib_merk && ! $request->merk_ac_id) {
            return back()->with('error', 'Merk AC wajib dipilih untuk layanan '.$layanan->nama.'.')->withInput();
        }

        $pesanan = Pesanan::firstOrCreate(
            [
                'pengguna_id' => Auth::id(),
                'status' => Pesanan::STATUS_DRAFT,
            ],
            [
                'kode_pesanan' => 'ORD-' . strtoupper(Str::random(10)),
                'total' => 0,
            ]
        );

        if (! $pesanan->bisaDiubahOlehPelanggan()) {
            return redirect()->route('pesanan.show', $pesanan)->with('error', 'Pesanan ini sudah tidak bisa diubah.');
        }

        $jumlah = (int) $request->jumlah;
        $hargaLayanan = (int) $layanan->harga_dasar;
        $hargaJarak = (int) $tarif->harga_jarak;
        $subtotal = ($hargaLayanan + $hargaJarak) * $jumlah;

        DetailPesanan::create([
            'pesanan_id' => $pesanan->id,
            'layanan_id' => $layanan->id,
            'merk_ac_id' => $request->merk_ac_id,
            'tarif_jarak_layanan_id' => $tarif->id,
            'jumlah' => $jumlah,
            'harga_layanan' => $hargaLayanan,
            'harga_jarak' => $hargaJarak,
            'subtotal' => $subtotal,
            'catatan' => $request->catatan,
        ]);

        $pesanan->hitungUlangTotal();

        return redirect()->route('pesanan.show', $pesanan)->with('success', 'Detail pesanan berhasil ditambahkan.');
    }

    public function show(Pesanan $pesanan)
    {
        $this->pastikanPemilik($pesanan);

        $pesanan->load(['detail.layanan', 'detail.merkAc', 'detail.tarifJarak.lokasi', 'pembayaran']);

        return view('pages.pesanan.detail', compact('pesanan'));
    }

    public function editDetail(DetailPesanan $detailPesanan)
    {
        $detailPesanan->load(['pesanan', 'layanan', 'merkAc', 'tarifJarak.lokasi']);
        $this->pastikanPemilik($detailPesanan->pesanan);
        $this->pastikanBisaDiubah($detailPesanan->pesanan);

        $merkAc = MerkAc::where('status', 'aktif')->orderBy('nama')->get();
        $tarif = TarifJarakLayanan::with('lokasi')
            ->where('layanan_id', $detailPesanan->layanan_id)
            ->get();

        return view('pages.pesanan.edit-detail', compact('detailPesanan', 'merkAc', 'tarif'));
    }

    public function updateDetail(Request $request, DetailPesanan $detailPesanan)
    {
        $detailPesanan->load(['pesanan', 'layanan']);
        $this->pastikanPemilik($detailPesanan->pesanan);
        $this->pastikanBisaDiubah($detailPesanan->pesanan);

        $request->validate([
            'tarif_jarak_layanan_id' => ['required', 'exists:tarif_jarak_layanan,id'],
            'merk_ac_id' => ['nullable', 'exists:merk_ac,id'],
            'jumlah' => ['required', 'integer', 'min:1'],
            'catatan' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($detailPesanan->layanan->wajib_merk && ! $request->merk_ac_id) {
            return back()->with('error', 'Merk AC wajib dipilih untuk layanan '.$detailPesanan->layanan->nama.'.')->withInput();
        }

        $tarif = TarifJarakLayanan::where('id', $request->tarif_jarak_layanan_id)
            ->where('layanan_id', $detailPesanan->layanan_id)
            ->firstOrFail();

        $jumlah = (int) $request->jumlah;
        $hargaLayanan = (int) $detailPesanan->layanan->harga_dasar;
        $hargaJarak = (int) $tarif->harga_jarak;
        $subtotal = ($hargaLayanan + $hargaJarak) * $jumlah;

        $detailPesanan->update([
            'merk_ac_id' => $request->merk_ac_id,
            'tarif_jarak_layanan_id' => $tarif->id,
            'jumlah' => $jumlah,
            'harga_layanan' => $hargaLayanan,
            'harga_jarak' => $hargaJarak,
            'subtotal' => $subtotal,
            'catatan' => $request->catatan,
        ]);

        $detailPesanan->pesanan->hitungUlangTotal();

        return redirect()->route('pesanan.show', $detailPesanan->pesanan)->with('success', 'Detail pesanan berhasil diperbarui.');
    }

    public function destroyDetail(DetailPesanan $detailPesanan)
    {
        $detailPesanan->load('pesanan');
        $pesanan = $detailPesanan->pesanan;

        $this->pastikanPemilik($pesanan);
        $this->pastikanBisaDiubah($pesanan);

        $detailPesanan->delete();
        $pesanan->hitungUlangTotal();

        return redirect()->route('pesanan.show', $pesanan)->with('success', 'Detail pesanan berhasil dihapus.');
    }

    public function destroy(Pesanan $pesanan)
    {
        $this->pastikanPemilik($pesanan);
        $this->pastikanBisaDiubah($pesanan);

        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan draft berhasil dihapus.');
    }

    private function pastikanPemilik(Pesanan $pesanan): void
    {
        abort_unless($pesanan->pengguna_id === Auth::id(), 403);
    }

    private function pastikanBisaDiubah(Pesanan $pesanan): void
    {
        if (! $pesanan->bisaDiubahOlehPelanggan()) {
            abort(403, 'Pesanan sudah tidak bisa diubah.');
        }
    }
}
