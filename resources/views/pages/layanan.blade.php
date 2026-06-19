@extends('layouts.aplikasi', ['judul' => 'Layanan'])

@section('konten')
    <section class="mb-6 grid gap-5 lg:grid-cols-[1.4fr_0.6fr]">
        <div class="kartu rounded-[2.2rem] p-6 sm:p-8">
            <p class="text-sm font-black text-blue-600">Daftar Layanan</p>
            <h2 class="mt-2 text-3xl font-black text-slate-950">Pilih layanan sesuai kebutuhan pelanggan.</h2>
            <p class="mt-3 max-w-3xl text-sm leading-7 text-slate-600">
                Setiap layanan memiliki tarif jarak sendiri. Harga akhir dihitung dari harga dasar layanan ditambah tarif jarak berdasarkan lokasi tujuan.
            </p>
        </div>

        <div class="kartu-gelap rounded-[2.2rem] p-6">
            <div class="flex items-center gap-4">
                <span class="flex h-14 w-14 items-center justify-center rounded-3xl bg-blue-600">
                    <i data-lucide="map-pin"></i>
                </span>

                <div>
                    <p class="text-sm text-white/55">Pusat Toko</p>
                    <p class="text-2xl font-black">Bekasi</p>
                </div>
            </div>

            <p class="mt-4 text-sm leading-6 text-white/60">
                Tarif jarak berbeda untuk Cuci AC, Service AC, Isi Freon, Bongkar Pasang AC, Beli AC, dan Jual AC.
            </p>
        </div>
    </section>

    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach($layanan as $item)
            <form action="{{ route('pesanan.store') }}" method="POST" class="kartu rounded-[2rem] p-6 transition duration-200 hover:-translate-y-1 hover:shadow-2xl">
                @csrf

                <input type="hidden" name="layanan_id" value="{{ $item->id }}">

                <div class="flex items-start justify-between gap-4">
                    <span class="badge-icon">
                        <i data-lucide="{{ $item->icon }}"></i>
                    </span>

                    @if($item->wajib_merk)
                        <span class="rounded-full bg-yellow-50 px-3 py-1 text-xs font-black text-yellow-700">
                            Wajib Merk
                        </span>
                    @else
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                            Aktif
                        </span>
                    @endif
                </div>

                <h3 class="mt-5 text-xl font-black text-slate-950">{{ $item->nama }}</h3>

                <p class="mt-2 min-h-16 text-sm leading-7 text-slate-600">
                    {{ $item->deskripsi }}
                </p>

                <p class="mt-4 text-2xl font-black text-slate-950">
                    Rp {{ number_format($item->harga_dasar, 0, ',', '.') }}
                </p>

                <label class="mt-5 block text-sm font-black text-slate-800">Lokasi dan Tarif Jarak</label>
                <select name="tarif_jarak_layanan_id" class="select-form mt-2" required>
                    @forelse($item->tarifJarak as $tarif)
                        <option value="{{ $tarif->id }}">
                            {{ $tarif->lokasi->kota }} - Tarif Jarak Rp {{ number_format($tarif->harga_jarak, 0, ',', '.') }}
                        </option>
                    @empty
                        <option value="">Tarif jarak belum tersedia</option>
                    @endforelse
                </select>

                @if($item->wajib_merk)
                    <label class="mt-4 block text-sm font-black text-slate-800">Merk AC</label>
                    <select name="merk_ac_id" class="select-form mt-2" required>
                        <option value="">Pilih merk AC</option>
                        @foreach($merkAc as $merk)
                            <option value="{{ $merk->id }}">{{ $merk->nama }}</option>
                        @endforeach
                    </select>
                @else
                    <input type="hidden" name="merk_ac_id" value="">
                @endif

                <label class="mt-4 block text-sm font-black text-slate-800">Jumlah</label>
                <input type="number" name="jumlah" value="1" min="1" class="input-form mt-2" required>

                <label class="mt-4 block text-sm font-black text-slate-800">Catatan</label>
                <textarea name="catatan" rows="3" class="input-form mt-2" placeholder="Contoh: AC 1 PK, kamar depan, outdoor sulit dijangkau.">{{ old('catatan') }}</textarea>

                <button class="mt-5 flex w-full items-center justify-center gap-2 rounded-2xl tombol-primer px-5 py-3 font-black">
                    <i data-lucide="plus"></i>
                    <span>Tambah ke Pesanan</span>
                </button>
            </form>
        @endforeach
    </div>
@endsection
