@extends('layouts.aplikasi', ['judul' => 'Admin Pesanan'])

@section('konten')
    <section class="mb-6 rounded-[2.2rem] kartu p-6 sm:p-8">
        <p class="text-sm font-black text-blue-600">Admin</p>
        <h2 class="mt-2 text-3xl font-black text-slate-950">Proses Pesanan Pelanggan</h2>
        <p class="mt-2 text-sm leading-7 text-slate-600">Admin hanya memproses pesanan yang sudah dibayar dan masuk status sedang ditinjau.</p>
    </section>

    <div class="space-y-4">
        @foreach($pesanan as $item)
            <div class="kartu rounded-[2rem] p-5">
                <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
                    <div>
                        <h3 class="text-lg font-black text-slate-950">{{ $item->kode_pesanan }}</h3>
                        <p class="mt-1 text-sm text-slate-500">{{ $item->pengguna->nama }} - {{ $item->pengguna->email }}</p>
                        <p class="mt-2 inline-flex rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                            {{ str_replace('_', ' ', strtoupper($item->status)) }}
                        </p>
                    </div>

                    <div class="md:text-right">
                        <p class="text-2xl font-black text-slate-950">Rp {{ number_format($item->total, 0, ',', '.') }}</p>
                        <a href="{{ route('admin.pesanan.show', $item) }}" class="mt-3 inline-flex rounded-2xl tombol-outline px-4 py-2 text-sm font-black">
                            Proses Pesanan
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
