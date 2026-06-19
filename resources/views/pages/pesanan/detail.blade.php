@extends('layouts.aplikasi', ['judul' => 'Detail Pesanan'])

@section('konten')
    <section class="mb-6 rounded-[2.2rem] kartu p-6 sm:p-8">
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <p class="text-sm font-black text-blue-600">{{ $pesanan->kode_pesanan }}</p>
                <h2 class="mt-2 text-3xl font-black text-slate-950">Detail Pesanan</h2>
                <p class="mt-2 inline-flex rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                    {{ str_replace('_', ' ', strtoupper($pesanan->status)) }}
                </p>
            </div>

            @if($pesanan->bisaDiubahOlehPelanggan())
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('pesanan.create') }}" class="rounded-2xl tombol-outline px-5 py-3 font-black">Tambah Detail</a>
                    @if($pesanan->detail->count() > 0)
                        <a href="{{ route('pembayaran.index', $pesanan) }}" class="rounded-2xl tombol-primer px-5 py-3 font-black">Lanjut Pembayaran</a>
                    @endif
                </div>
            @endif
        </div>
    </section>

    @if(! $pesanan->bisaDiubahOlehPelanggan())
        <div class="mb-5 rounded-2xl border border-yellow-200 bg-yellow-50 px-4 py-3 text-sm font-semibold text-yellow-700">
            Pesanan sudah masuk pembayaran atau proses admin. Pelanggan tidak dapat menambah, mengedit, atau menghapus detail pesanan.
        </div>
    @endif

    <div class="grid gap-6 lg:grid-cols-[1fr_22rem]">
        <div class="space-y-4">
            @foreach($pesanan->detail as $detail)
                <div class="kartu rounded-[2rem] p-5">
                    <div class="flex flex-col justify-between gap-5 md:flex-row">
                        <div>
                            <h3 class="text-lg font-black text-slate-950">{{ $detail->layanan->nama }}</h3>
                            <p class="mt-1 text-sm text-slate-500">
                                Lokasi: {{ $detail->tarifJarak->lokasi->kota }}
                            </p>

                            @if($detail->merkAc)
                                <p class="mt-1 text-sm text-slate-500">Merk AC: {{ $detail->merkAc->nama }}</p>
                            @endif

                            @if($detail->catatan)
                                <p class="mt-3 rounded-2xl bg-slate-50 p-3 text-sm leading-6 text-slate-600">{{ $detail->catatan }}</p>
                            @endif
                        </div>

                        <div class="md:text-right">
                            <p class="text-sm font-bold text-slate-500">Jumlah: {{ $detail->jumlah }}</p>
                            <p class="mt-1 text-sm text-slate-500">Layanan: Rp {{ number_format($detail->harga_layanan, 0, ',', '.') }}</p>
                            <p class="mt-1 text-sm text-slate-500">Jarak: Rp {{ number_format($detail->harga_jarak, 0, ',', '.') }}</p>
                            <p class="mt-2 text-2xl font-black text-slate-950">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</p>

                            @if($pesanan->bisaDiubahOlehPelanggan())
                                <div class="mt-4 flex gap-2 md:justify-end">
                                    <a href="{{ route('detail-pesanan.edit', $detail) }}" class="rounded-xl bg-blue-50 px-4 py-2 text-sm font-black text-blue-700">Edit</a>

                                    <form action="{{ route('detail-pesanan.destroy', $detail) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-xl bg-red-50 px-4 py-2 text-sm font-black text-red-600">Hapus</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="kartu h-fit rounded-[2rem] p-6">
            <h3 class="text-xl font-black text-slate-950">Ringkasan</h3>

            <div class="mt-5 rounded-3xl bg-slate-50 p-4">
                <p class="text-sm font-bold text-slate-500">Total</p>
                <p class="mt-1 text-3xl font-black text-slate-950">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</p>
            </div>

            @if($pesanan->pembayaran)
                <div class="mt-4 rounded-3xl bg-blue-50 p-4">
                    <p class="text-sm font-black text-blue-700">Pembayaran</p>
                    <p class="mt-1 text-sm text-blue-700">{{ $pesanan->pembayaran->metode }}</p>
                    <p class="mt-1 text-sm text-blue-700">{{ $pesanan->pembayaran->status }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
