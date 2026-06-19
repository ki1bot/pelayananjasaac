@extends('layouts.aplikasi')

@section('konten')
    <div class="mb-5">
        <h2 class="text-2xl font-bold text-slate-950">Pembayaran</h2>
        <p class="mt-1 text-slate-600">Pilih metode pembayaran yang tersedia.</p>
    </div>

    <div class="grid gap-5 lg:grid-cols-3">
        <div class="kartu rounded-3xl p-6 lg:col-span-2">
            <h3 class="text-lg font-bold">Metode Pembayaran</h3>

            <form action="{{ route('pembayaran.store') }}" method="POST" class="mt-5 space-y-3">
                @csrf

                @foreach($metode as $item)
                    <label class="flex cursor-pointer items-center justify-between rounded-2xl border border-slate-200 p-4 hover:border-blue-500">
                        <span class="font-semibold">{{ $item }}</span>
                        <input type="radio" name="metode" value="{{ $item }}" required>
                    </label>
                @endforeach

                <button class="mt-5 w-full rounded-xl tombol-primer px-5 py-3 font-semibold">
                    Buat Pembayaran
                </button>
            </form>
        </div>

        <div class="kartu h-fit rounded-3xl p-6">
            <h3 class="text-lg font-bold">Total Tagihan</h3>
            <div class="mt-5 space-y-3">
                @foreach($keranjang as $item)
                    <div class="flex justify-between text-sm">
                        <span>{{ $item->layanan->nama }}</span>
                        <span>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                    </div>
                @endforeach
            </div>
            <div class="mt-5 flex justify-between border-t pt-5 text-lg font-bold">
                <span>Total</span>
                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
@endsection
