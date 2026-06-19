@extends('layouts.aplikasi')

@section('konten')
    <div class="mb-5">
        <h2 class="text-2xl font-bold text-slate-950">Daftar Layanan</h2>
        <p class="mt-1 text-slate-600">Pilih layanan, lokasi, dan jumlah. Biaya jarak dihitung otomatis dari Bekasi.</p>
    </div>

    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach($layanan as $item)
            <form action="{{ route('keranjang.store') }}" method="POST" class="kartu rounded-3xl p-6">
                @csrf
                <input type="hidden" name="layanan_id" value="{{ $item->id }}">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-100 text-blue-600">
                    <i data-lucide="{{ $item->icon }}"></i>
                </div>

                <h3 class="mt-5 text-xl font-bold">{{ $item->nama }}</h3>
                <p class="mt-2 min-h-12 text-sm text-slate-600">{{ $item->deskripsi }}</p>
                <p class="mt-4 text-lg font-bold text-slate-950">Rp {{ number_format($item->harga_dasar, 0, ',', '.') }}</p>

                <label class="mt-5 block text-sm font-semibold">Lokasi</label>
                <select name="lokasi_layanan_id" class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3" required>
                    @foreach($lokasi as $lokasiItem)
                        <option value="{{ $lokasiItem->id }}">
                            {{ $lokasiItem->kota }} - {{ $lokasiItem->jarak_km }} KM - Biaya Rp {{ number_format($lokasiItem->jarak_km * $biayaPerKm, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>

                <label class="mt-4 block text-sm font-semibold">Jumlah</label>
                <input type="number" name="jumlah" value="1" min="1" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" required>

                <button class="mt-5 w-full rounded-xl tombol-primer px-5 py-3 font-semibold">
                    Tambah ke Keranjang
                </button>
            </form>
        @endforeach
    </div>
@endsection
