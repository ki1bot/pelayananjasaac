@extends('layouts.aplikasi', ['judul' => 'Buat Pesanan'])

@section('konten')
    <section class="mb-6 rounded-[2.2rem] kartu p-6 sm:p-8">
        <p class="text-sm font-black text-blue-600">Buat Pesanan</p>
        <h2 class="mt-2 text-3xl font-black text-slate-950">Pilih layanan dan lokasi.</h2>
        <p class="mt-2 text-sm leading-7 text-slate-600">Merk AC wajib dipilih untuk layanan Beli AC, Jual AC, dan Service AC.</p>
    </section>

    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach($layanan as $item)
            <form action="{{ route('pesanan.store') }}" method="POST" class="kartu rounded-[2rem] p-6">
                @csrf

                <input type="hidden" name="layanan_id" value="{{ $item->id }}">

                <div class="flex items-start justify-between gap-4">
                    <span class="badge-icon">
                        <i data-lucide="{{ $item->icon }}"></i>
                    </span>

                    @if($item->wajib_merk)
                        <span class="rounded-full bg-yellow-50 px-3 py-1 text-xs font-black text-yellow-700">Wajib Merk</span>
                    @else
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">Opsional</span>
                    @endif
                </div>

                <h3 class="mt-5 text-xl font-black text-slate-950">{{ $item->nama }}</h3>
                <p class="mt-2 min-h-16 text-sm leading-7 text-slate-600">{{ $item->deskripsi }}</p>

                <p class="mt-4 text-2xl font-black text-slate-950">
                    Rp {{ number_format($item->harga_dasar, 0, ',', '.') }}
                </p>

                <label class="mt-5 block text-sm font-black text-slate-800">Lokasi dan Tarif Jarak</label>
                <select name="tarif_jarak_layanan_id" class="select-form mt-2" required>
                    @foreach($item->tarifJarak as $tarif)
                        <option value="{{ $tarif->id }}">
                            {{ $tarif->lokasi->kota }} - Rp {{ number_format($tarif->harga_jarak, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>

                <label class="mt-4 block text-sm font-black text-slate-800">Merk AC</label>
                <select name="merk_ac_id" class="select-form mt-2">
                    <option value="">Pilih merk AC</option>
                    @foreach($merkAc as $merk)
                        <option value="{{ $merk->id }}">{{ $merk->nama }}</option>
                    @endforeach
                </select>

                <label class="mt-4 block text-sm font-black text-slate-800">Jumlah</label>
                <input type="number" name="jumlah" value="1" min="1" class="input-form mt-2" required>

                <label class="mt-4 block text-sm font-black text-slate-800">Catatan</label>
                <textarea name="catatan" rows="3" class="input-form mt-2" placeholder="Contoh: AC 1 PK, kamar depan, unit outdoor sulit dijangkau."></textarea>

                <button class="mt-5 flex w-full items-center justify-center gap-2 rounded-2xl tombol-primer px-5 py-3 font-black">
                    <i data-lucide="plus"></i>
                    <span>Tambah Detail Pesanan</span>
                </button>
            </form>
        @endforeach
    </div>
@endsection
