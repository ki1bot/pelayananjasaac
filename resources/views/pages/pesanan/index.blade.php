@extends('layouts.aplikasi', ['judul' => 'Pesanan Saya'])

@section('konten')
    <section class="mb-6 flex flex-col justify-between gap-4 rounded-[2.2rem] kartu p-6 sm:p-8 md:flex-row md:items-center">
        <div>
            <p class="text-sm font-black text-blue-600">Pesanan</p>
            <h2 class="mt-2 text-3xl font-black text-slate-950">Pesanan Saya</h2>
            <p class="mt-2 text-sm leading-7 text-slate-600">
                Pelanggan dapat membuat, mengedit, dan menghapus detail pesanan selama status masih draft.
            </p>
        </div>

        <a href="{{ route('pesanan.create') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl tombol-primer px-5 py-3 font-black">
            <i data-lucide="plus"></i>
            <span>Buat Pesanan</span>
        </a>
    </section>

    <div class="space-y-4">
        @forelse($pesanan as $item)
            <div class="kartu rounded-[2rem] p-5 transition duration-200 hover:-translate-y-1 hover:shadow-2xl">
                <div class="flex flex-col justify-between gap-5 md:flex-row md:items-center">
                    <div class="flex gap-4">
                        <span class="badge-icon">
                            <i data-lucide="clipboard-list"></i>
                        </span>

                        <div>
                            <h3 class="text-lg font-black text-slate-950">{{ $item->kode_pesanan }}</h3>
                            <p class="mt-1 text-sm font-semibold text-slate-500">{{ $item->detail->count() }} detail pesanan</p>
                            <span class="status-pill status-{{ $item->status }} mt-3">
                                {{ str_replace('_', ' ', strtoupper($item->status)) }}
                            </span>
                        </div>
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
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-50 text-blue-600">
                    <i data-lucide="clipboard-list"></i>
                </div>

                <h3 class="mt-4 text-xl font-black text-slate-950">Belum ada pesanan</h3>
                <p class="mt-2 text-sm text-slate-500">Buat pesanan pertama kamu dari halaman layanan.</p>

                <a href="{{ route('layanan.index') }}" class="mt-5 inline-flex rounded-2xl tombol-primer px-5 py-3 font-black">
                    Pilih Layanan
                </a>
            </div>
        @endforelse
    </div>
@endsection
