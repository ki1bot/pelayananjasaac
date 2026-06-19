@extends('layouts.aplikasi', ['judul' => 'Proses Pesanan'])

@section('konten')
    <section class="mb-6 rounded-[2.2rem] kartu p-6 sm:p-8">
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <p class="text-sm font-black text-blue-600">{{ $pesanan->kode_pesanan }}</p>
                <h2 class="mt-2 text-3xl font-black text-slate-950">Proses Pesanan</h2>
                <p class="mt-2 text-sm text-slate-600">{{ $pesanan->pengguna->nama }} - {{ $pesanan->pengguna->email }}</p>

                <span class="status-pill status-{{ $pesanan->status }} mt-3">
                    {{ str_replace('_', ' ', strtoupper($pesanan->status)) }}
                </span>
            </div>

            <div class="flex flex-wrap gap-3">
                @if($pesanan->status === 'sedang_ditinjau')
                    <form action="{{ route('admin.pesanan.proses', $pesanan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="rounded-2xl tombol-primer px-5 py-3 font-black">Proses Pesanan</button>
                    </form>
                @endif

                @if($pesanan->status === 'diproses')
                    <form action="{{ route('admin.pesanan.selesai', $pesanan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="rounded-2xl tombol-primer px-5 py-3 font-black">Selesaikan Pesanan</button>
                    </form>
                @endif
            </div>
        </div>
    </section>

    <div class="grid gap-6 lg:grid-cols-[1fr_22rem]">
        <div class="space-y-4">
            @foreach($pesanan->detail as $detail)
                <div class="kartu rounded-[2rem] p-5">
                    <div class="flex gap-4">
                        <span class="badge-icon">
                            <i data-lucide="{{ $detail->layanan->icon }}"></i>
                        </span>

                        <div class="flex-1">
                            <h3 class="text-lg font-black text-slate-950">{{ $detail->layanan->nama }}</h3>
                            <p class="mt-1 text-sm text-slate-500">Lokasi: {{ $detail->tarifJarak->lokasi->kota }}</p>

                            @if($detail->merkAc)
                                <p class="mt-1 text-sm text-slate-500">Merk AC: {{ $detail->merkAc->nama }}</p>
                            @endif

                            <p class="mt-2 text-sm text-slate-500">Jumlah: {{ $detail->jumlah }}</p>

                            @if($detail->catatan)
                                <p class="mt-3 rounded-2xl bg-slate-50 p-3 text-sm leading-6 text-slate-600">{{ $detail->catatan }}</p>
                            @endif

                            <p class="mt-4 text-xl font-black text-slate-950">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="kartu h-fit rounded-[2rem] p-6">
            <h3 class="text-xl font-black text-slate-950">Ringkasan</h3>

            <p class="mt-5 text-sm font-bold text-slate-500">Metode Pembayaran</p>
            <p class="mt-1 font-black text-slate-950">{{ $pesanan->pembayaran?->metode ?? '-' }}</p>

            <p class="mt-5 text-sm font-bold text-slate-500">Status Pembayaran</p>
            <p class="mt-1 font-black text-slate-950">{{ $pesanan->pembayaran?->status ? str_replace('_', ' ', strtoupper($pesanan->pembayaran->status)) : '-' }}</p>

            <p class="mt-5 text-sm font-bold text-slate-500">Total</p>
            <p class="mt-1 text-3xl font-black text-slate-950">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</p>
        </div>
    </div>
@endsection
