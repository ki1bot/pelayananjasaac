@extends('layouts.aplikasi', ['judul' => 'Layanan'])

@section('konten')
    <section class="mb-6 grid gap-5 lg:grid-cols-[1.4fr_0.6fr]">
        <div class="kartu rounded-[2.2rem] p-6 sm:p-8">
            <p class="text-sm font-black text-blue-600">Daftar Layanan</p>
            <h2 class="mt-2 text-3xl font-black text-slate-950">Pilih layanan sesuai kebutuhan pelanggan.</h2>
            <p class="mt-3 max-w-3xl text-sm leading-7 text-slate-600">
                Harga akhir dihitung dari harga dasar layanan ditambah biaya jarak berdasarkan kota tujuan.
            </p>
        </div>

        <div class="kartu-gelap rounded-[2.2rem] p-6">
            <div class="flex items-center gap-4">
                <span class="flex h-14 w-14 items-center justify-center rounded-3xl bg-blue-600">
                    <i data-lucide="calculator"></i>
                </span>
                <div>
                    <p class="text-sm text-white/55">Biaya per KM</p>
                    <p class="text-2xl font-black">Rp {{ number_format($biayaPerKm, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </section>

    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach($layanan as $item)
            <form action="{{ route('keranjang.store') }}" method="POST" class="kartu rounded-[2rem] p-6 transition duration-200 hover:-translate-y-1 hover:shadow-2xl">
                @csrf
                <input type="hidden" name="layanan_id" value="{{ $item->id }}">

                <div class="flex items-start justify-between gap-4">
                    <span class="badge-icon">
                        <i data-lucide="{{ $item->icon }}"></i>
                    </span>

                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">Aktif</span>
                </div>

                <h3 class="mt-5 text-xl font-black text-slate-950">{{ $item->nama }}</h3>
                <p class="mt-2 min-h-16 text-sm leading-7 text-slate-600">{{ $item->deskripsi }}</p>
                <p class="mt-4 text-2xl font-black text-slate-950">Rp {{ number_format($item->harga_dasar, 0, ',', '.') }}</p>

                <label class="mt-5 block text-sm font-black text-slate-800">Lokasi</label>
                <select name="lokasi_layanan_id" class="select-form mt-2" required>
                    @foreach($lokasi as $lokasiItem)
                        <option value="{{ $lokasiItem->id }}">
                            {{ $lokasiItem->kota }} - {{ $lokasiItem->jarak_km }} KM - Rp {{ number_format($lokasiItem->jarak_km * $biayaPerKm, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>

                <label class="mt-4 block text-sm font-black text-slate-800">Jumlah</label>
                <input type="number" name="jumlah" value="1" min="1" class="input-form mt-2" required>

                <button class="mt-5 flex w-full items-center justify-center gap-2 rounded-2xl tombol-primer px-5 py-3 font-black">
                    <i data-lucide="shopping-cart"></i>
                    <span>Tambah ke Keranjang</span>
                </button>
            </form>
        @endforeach
    </div>
@endsection
