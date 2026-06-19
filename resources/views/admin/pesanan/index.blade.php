@extends('layouts.aplikasi', ['judul' => 'Admin Pesanan'])

@section('konten')
    <section class="mb-6 rounded-[2.2rem] kartu p-6 sm:p-8">
        <p class="text-sm font-black text-blue-600">Admin</p>
        <h2 class="mt-2 text-3xl font-black text-slate-950">Proses Pesanan Pelanggan</h2>
        <p class="mt-2 text-sm leading-7 text-slate-600">
            Admin hanya memproses pesanan yang sudah dibayar dan masuk status sedang ditinjau.
        </p>
    </section>

    <div class="space-y-4">
        @forelse($pesanan as $item)
            <div class="kartu rounded-[2rem] p-5 transition duration-200 hover:-translate-y-1 hover:shadow-2xl">
                <div class="flex flex-col justify-between gap-5 md:flex-row md:items-center">
                    <div class="flex gap-4">
                        <span class="badge-icon">
                            <i data-lucide="shield-check"></i>
                        </span>

                        <div>
                            <h3 class="text-lg font-black text-slate-950">{{ $item->kode_pesanan }}</h3>
                            <p class="mt-1 text-sm font-semibold text-slate-500">{{ $item->pengguna->nama }} - {{ $item->pengguna->email }}</p>

                            <span class="status-pill status-{{ $item->status }} mt-3">
                                {{ str_replace('_', ' ', strtoupper($item->status)) }}
                            </span>
                        </div>
                    </div>

                    <div class="md:text-right">
                        <p class="text-2xl font-black text-slate-950">Rp {{ number_format($item->total, 0, ',', '.') }}</p>

                        <a href="{{ route('admin.pesanan.show', $item) }}" class="mt-3 inline-flex rounded-2xl tombol-outline px-4 py-2 text-sm font-black">
                            Proses Pesanan
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="kartu rounded-[2rem] p-10 text-center">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-50 text-blue-600">
                    <i data-lucide="inbox"></i>
                </div>

                <h3 class="mt-4 text-xl font-black text-slate-950">Belum ada pesanan masuk</h3>
                <p class="mt-2 text-sm text-slate-500">Pesanan yang sudah dibayar akan muncul di sini.</p>
            </div>
        @endforelse
    </div>
@endsection
