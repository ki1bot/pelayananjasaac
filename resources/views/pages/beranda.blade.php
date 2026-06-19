@extends('layouts.aplikasi')

@section('konten')
    <section class="grid gap-5 lg:grid-cols-3">
        <div class="kartu rounded-3xl p-6 lg:col-span-2">
            <p class="text-sm font-semibold text-blue-600">Pelayanan Jasa AC</p>
            <h2 class="mt-2 text-3xl font-bold text-slate-950">Service AC cepat untuk Bekasi, Jakarta, Bogor, dan Tangerang</h2>
            <p class="mt-4 text-slate-600">Harga otomatis mengikuti jarak. Semakin jauh kota tujuan dari pusat toko Bekasi, semakin besar biaya perjalanan.</p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('layanan.index') }}" class="rounded-xl tombol-primer px-5 py-3 font-semibold">Pesan Layanan</a>
                <a href="{{ route('keranjang.index') }}" class="rounded-xl border border-slate-300 px-5 py-3 font-semibold">Lihat Keranjang</a>
            </div>
        </div>

        <div class="kartu rounded-3xl p-6">
            <h3 class="text-lg font-bold">Area Layanan</h3>
            <div class="mt-4 space-y-3 text-sm text-slate-600">
                <p>Bekasi: pusat toko</p>
                <p>Jakarta: biaya jarak sedang</p>
                <p>Bogor: biaya jarak tinggi</p>
                <p>Tangerang: biaya jarak tinggi</p>
            </div>
        </div>
    </section>

    <section class="mt-5 grid gap-5 lg:grid-cols-2">
        <div class="kartu rounded-3xl p-6">
            <h3 class="text-lg font-bold">Grafik Produk</h3>
            <canvas id="grafikProduk" class="mt-5"></canvas>
        </div>

        <div class="grid gap-4">
            @foreach($layanan as $item)
                <div class="kartu rounded-3xl p-5">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100 text-blue-600">
                            <i data-lucide="{{ $item->icon }}"></i>
                        </div>
                        <div>
                            <h4 class="font-bold">{{ $item->nama }}</h4>
                            <p class="text-sm text-slate-500">Mulai Rp {{ number_format($item->harga_dasar, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@push('script')
<script>
    const labelProduk = @json($grafik->pluck('nama_produk'));
    const dataProduk = @json($grafik->pluck('jumlah_pesanan'));

    new Chart(document.getElementById('grafikProduk'), {
        type: 'bar',
        data: {
            labels: labelProduk,
            datasets: [{
                label: 'Jumlah Pesanan',
                data: dataProduk
            }]
        }
    });
</script>
@endpush
