@extends('layouts.aplikasi', ['judul' => 'Keranjang'])

@section('konten')
    <section class="mb-6 flex flex-col justify-between gap-4 rounded-[2.2rem] kartu p-6 sm:p-8 md:flex-row md:items-center">
        <div>
            <p class="text-sm font-black text-blue-600">Keranjang</p>
            <h2 class="mt-2 text-3xl font-black text-slate-950">Cek pesanan sebelum pembayaran.</h2>
            <p class="mt-2 text-sm leading-7 text-slate-600">
                Pastikan layanan, lokasi, jumlah, dan total sudah benar.
            </p>
        </div>

        <a href="{{ route('layanan.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl tombol-primer px-5 py-3 font-black">
            <i data-lucide="plus"></i>
            <span>Tambah Layanan</span>
        </a>
    </section>

    <div class="grid gap-6 lg:grid-cols-[1fr_22rem]">
        <div class="space-y-4">
            @forelse($keranjang as $item)
                <div class="kartu rounded-[2rem] p-5">
                    <div class="flex flex-col justify-between gap-5 md:flex-row md:items-center">
                        <div class="flex gap-4">
                            <span class="badge-icon">
                                <i data-lucide="{{ $item->layanan->icon }}"></i>
                            </span>

                            <div>
                                <h3 class="text-lg font-black text-slate-950">{{ $item->layanan->nama }}</h3>
                                <p class="mt-1 text-sm font-semibold text-slate-500">{{ $item->lokasi->kota }} - {{ $item->lokasi->jarak_km }} KM</p>
                                <p class="mt-3 text-sm leading-6 text-slate-600">
                                    Harga layanan Rp {{ number_format($item->harga_layanan, 0, ',', '.') }} + biaya jarak Rp {{ number_format($item->biaya_jarak, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <div class="md:text-right">
                            <p class="text-sm font-bold text-slate-500">Jumlah: {{ $item->jumlah }}</p>
                            <p class="mt-1 text-2xl font-black text-slate-950">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>

                            <form action="{{ route('keranjang.destroy', $item) }}" method="POST" class="mt-3">
                                @csrf
                                @method('DELETE')
                                <button class="inline-flex items-center gap-2 rounded-xl bg-red-50 px-4 py-2 text-sm font-black text-red-600 transition hover:bg-red-100">
                                    <i data-lucide="trash-2" class="h-4 w-4"></i>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="kartu rounded-[2rem] p-10 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-50 text-blue-600">
                        <i data-lucide="shopping-cart"></i>
                    </div>
                    <h3 class="mt-4 text-xl font-black text-slate-950">Keranjang masih kosong</h3>
                    <p class="mt-2 text-sm text-slate-500">Tambahkan layanan terlebih dahulu sebelum melakukan pembayaran.</p>
                </div>
            @endforelse
        </div>

        <div class="kartu h-fit rounded-[2rem] p-6">
            <h3 class="text-xl font-black text-slate-950">Ringkasan</h3>

            <div class="mt-5 rounded-3xl bg-slate-50 p-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-slate-500">Total Tagihan</span>
                    <span class="text-2xl font-black text-slate-950">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

            <a href="{{ route('pembayaran.index') }}" class="mt-5 flex items-center justify-center gap-2 rounded-2xl tombol-primer px-5 py-3 font-black">
                <i data-lucide="credit-card"></i>
                <span>Lanjut Pembayaran</span>
            </a>
        </div>
    </div>
@endsection
