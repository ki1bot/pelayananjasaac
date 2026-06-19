@extends('layouts.aplikasi', ['judul' => 'Pembayaran'])

@section('konten')
    <section class="mb-6 rounded-[2.2rem] kartu p-6 sm:p-8">
        <p class="text-sm font-black text-blue-600">Pembayaran</p>
        <h2 class="mt-2 text-3xl font-black text-slate-950">Pilih metode pembayaran.</h2>
        <p class="mt-2 text-sm leading-7 text-slate-600">
            Pembayaran dibuat dengan status menunggu sampai dikonfirmasi.
        </p>
    </section>

    <div class="grid gap-6 lg:grid-cols-[1fr_22rem]">
        <div class="kartu rounded-[2rem] p-6">
            <h3 class="text-xl font-black text-slate-950">Metode Pembayaran</h3>

            <form action="{{ route('pembayaran.store') }}" method="POST" class="mt-5 space-y-3">
                @csrf

                @foreach($metode as $item)
                    <label class="flex cursor-pointer items-center justify-between rounded-3xl border border-slate-200 bg-white px-5 py-4 transition hover:border-blue-400 hover:bg-blue-50/40">
                        <span class="flex items-center gap-3 font-black text-slate-800">
                            <span class="badge-icon h-10 w-10 rounded-2xl">
                                <i data-lucide="wallet"></i>
                            </span>
                            <span>{{ $item }}</span>
                        </span>

                        <input type="radio" name="metode" value="{{ $item }}" required class="h-5 w-5">
                    </label>
                @endforeach

                <button class="mt-5 flex w-full items-center justify-center gap-2 rounded-2xl tombol-primer px-5 py-3 font-black">
                    <i data-lucide="check-circle"></i>
                    <span>Buat Pembayaran</span>
                </button>
            </form>
        </div>

        <div class="kartu h-fit rounded-[2rem] p-6">
            <h3 class="text-xl font-black text-slate-950">Total Tagihan</h3>

            <div class="mt-5 space-y-3">
                @foreach($keranjang as $item)
                    <div class="flex justify-between gap-4 rounded-2xl bg-slate-50 px-4 py-3 text-sm">
                        <span class="font-bold text-slate-700">{{ $item->layanan->nama }}</span>
                        <span class="font-black text-slate-950">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                    </div>
                @endforeach
            </div>

            <div class="mt-5 flex justify-between border-t border-slate-200 pt-5 text-lg font-black">
                <span>Total</span>
                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
@endsection
