@extends('layouts.aplikasi')

@section('konten')
    <div class="mb-5 flex flex-col justify-between gap-3 md:flex-row md:items-center">
        <div>
            <h2 class="text-2xl font-bold text-slate-950">Keranjang</h2>
            <p class="mt-1 text-slate-600">Cek layanan sebelum melanjutkan pembayaran.</p>
        </div>
        <a href="{{ route('layanan.index') }}" class="rounded-xl border border-slate-300 px-5 py-3 font-semibold">Tambah Layanan</a>
    </div>

    <div class="grid gap-5 lg:grid-cols-3">
        <div class="space-y-4 lg:col-span-2">
            @forelse($keranjang as $item)
                <div class="kartu rounded-3xl p-5">
                    <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
                        <div>
                            <h3 class="text-lg font-bold">{{ $item->layanan->nama }}</h3>
                            <p class="text-sm text-slate-500">{{ $item->lokasi->kota }} - {{ $item->lokasi->jarak_km }} KM</p>
                            <p class="mt-2 text-sm text-slate-600">
                                Harga layanan Rp {{ number_format($item->harga_layanan, 0, ',', '.') }} + biaya jarak Rp {{ number_format($item->biaya_jarak, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold">Jumlah: {{ $item->jumlah }}</p>
                            <p class="text-lg font-bold">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                            <form action="{{ route('keranjang.destroy', $item) }}" method="POST" class="mt-3">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm font-semibold text-red-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="kartu rounded-3xl p-8 text-center">
                    <p class="text-slate-600">Keranjang masih kosong.</p>
                </div>
            @endforelse
        </div>

        <div class="kartu h-fit rounded-3xl p-6">
            <h3 class="text-lg font-bold">Ringkasan</h3>
            <div class="mt-5 flex justify-between border-t pt-5">
                <span>Total</span>
                <span class="text-xl font-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <a href="{{ route('pembayaran.index') }}" class="mt-5 block rounded-xl tombol-primer px-5 py-3 text-center font-semibold">
                Lanjut Pembayaran
            </a>
        </div>
    </div>
@endsection
