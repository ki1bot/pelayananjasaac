@extends('layouts.aplikasi', ['judul' => 'Pesanan Saya'])

@section('konten')
    <section class="mb-6 flex flex-col justify-between gap-4 rounded-[2.2rem] kartu p-6 sm:p-8 md:flex-row md:items-center">
        <div>
            <p class="text-sm font-black text-blue-600">Pesanan</p>
            <h2 class="mt-2 text-3xl font-black text-slate-950">Pesanan Saya</h2>
            <p class="mt-2 text-sm leading-7 text-slate-600">Pelanggan hanya dapat membuat dan mengubah pesanan sebelum pembayaran.</p>
        </div>

        <a href="{{ route('pesanan.create') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl tombol-primer px-5 py-3 font-black">
            <i data-lucide="plus"></i>
            <span>Buat Pesanan</span>
        </a>
    </section>

    <div class="space-y-4">
        @forelse($pesanan as $item)
            <div class="kartu rounded-[2rem] p-5">
                <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
                    <div>
                        <h3 class="text-lg font-black text-slate-950">{{ $item->kode_pesanan }}</h3>
                        <p class="mt-1 text-sm text-slate-500">{{ $item->detail->count() }} detail pesanan</p>
                        <p class="mt-2 inline-flex rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                            {{ str_replace('_', ' ', strtoupper($item->status)) }}
                        </p>
                    </div>

                    <div class="md:text-right">
                        <p class="text-2xl font-black text-slate-950">Rp {{ number_format($item->total, 0, ',', '.') }}</p>
                        <a href="{{ route('pesanan.show', $item) }}" class="mt-3 inline-flex rounded-2xl tombol-outline px-4 py-2 text-sm font-black">
                            Detail Pesanan
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="kartu rounded-[2rem] p-10 text-center">
                <h3 class="text-xl font-black text-slate-950">Belum ada pesanan</h3>
                <p class="mt-2 text-sm text-slate-500">Buat pesanan terlebih dahulu.</p>
            </div>
        @endforelse
    </div>
@endsection
