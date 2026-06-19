@extends('layouts.aplikasi', ['judul' => 'Pelayanan Jasa AC'])

@section('konten')
    @php
        $labelGrafik = $grafik->pluck('nama')->values();
        $dataGrafik = $grafik->pluck('harga')->values();
    @endphp

    <div id="dataGrafikProduk" class="hidden" data-labels='@json($labelGrafik)' data-values='@json($dataGrafik)'></div>

    <section class="grid gap-6 xl:grid-cols-[1.6fr_0.8fr]">
        <div class="kartu overflow-hidden rounded-[2rem]">
            <div class="grid gap-8 p-6 sm:p-8 lg:grid-cols-[1.3fr_0.7fr] lg:items-center">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-4 py-2 text-sm font-bold text-blue-700">
                        <i data-lucide="sparkles" class="h-4 w-4"></i>
                        <span>Pelayanan Jasa AC</span>
                    </div>

                    <h2 class="mt-5 text-3xl font-black leading-tight tracking-tight text-slate-950 sm:text-4xl">
                        Service, beli, dan jual AC untuk area Jabodetabek.
                    </h2>

                    <p class="mt-4 max-w-2xl text-base leading-7 text-slate-600">
                        Pusat toko berada di Bekasi. Biaya layanan dihitung dari harga dasar ditambah biaya jarak, sehingga semakin jauh lokasi pelanggan maka total harga akan ikut naik secara otomatis.
                    </p>

                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('layanan.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl tombol-primer px-6 py-3 font-bold">
                            <i data-lucide="calendar-plus" class="h-5 w-5"></i>
                            <span>Pesan Layanan</span>
                        </a>

                        <a href="{{ route('keranjang.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl tombol-outline px-6 py-3 font-bold">
                            <i data-lucide="shopping-cart" class="h-5 w-5"></i>
                            <span>Lihat Keranjang</span>
                        </a>
                    </div>
                </div>

                <div class="rounded-[1.7rem] bg-slate-950 p-5 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-white/55">Mulai dari</p>
                            <p class="mt-1 text-3xl font-black">Rp 75K</p>
                        </div>

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-600">
                            <i data-lucide="wind"></i>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <div class="rounded-2xl bg-white/8 p-4">
                            <p class="text-2xl font-black">4</p>
                            <p class="mt-1 text-xs text-white/55">Area kota</p>
                        </div>

                        <div class="rounded-2xl bg-white/8 p-4">
                            <p class="text-2xl font-black">{{ $layanan->count() }}</p>
                            <p class="mt-1 text-xs text-white/55">Jenis layanan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kartu rounded-[2rem] p-6 sm:p-8">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-blue-600">Area Layanan</p>
                    <h3 class="mt-2 text-xl font-black text-slate-950">Jangkauan Kota</h3>
                </div>

                <span class="badge-icon">
                    <i data-lucide="map-pin"></i>
                </span>
            </div>

            <div class="mt-6 space-y-3">
                <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                    <span class="font-semibold text-slate-800">Bekasi</span>
                    <span class="text-sm text-slate-500">Pusat toko</span>
                </div>

                <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                    <span class="font-semibold text-slate-800">Jakarta</span>
                    <span class="text-sm text-slate-500">Jarak sedang</span>
                </div>

                <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                    <span class="font-semibold text-slate-800">Bogor</span>
                    <span class="text-sm text-slate-500">Jarak jauh</span>
                </div>

                <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                    <span class="font-semibold text-slate-800">Tangerang</span>
                    <span class="text-sm text-slate-500">Jarak jauh</span>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-6 grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
        <div class="kartu rounded-[2rem] p-6 sm:p-8">
            <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
                <div>
                    <p class="text-sm font-bold text-blue-600">Statistik</p>
                    <h3 class="mt-2 text-xl font-black text-slate-950">Grafik Produk</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        Grafik ini diambil langsung dari tabel layanan, bukan dari tabel grafik beranda.
                    </p>
                </div>

                <div class="rounded-2xl bg-blue-50 px-4 py-2 text-sm font-bold text-blue-700">
                    Harga dasar
                </div>
            </div>

            <div class="mt-6 h-[320px]">
                <canvas id="grafikProduk"></canvas>
            </div>
        </div>

        <div class="grid gap-4">
            @foreach($layanan as $item)
                <div class="kartu rounded-[1.7rem] p-5 transition hover:-translate-y-1 hover:shadow-2xl">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-4">
                            <span class="badge-icon shrink-0">
                                <i data-lucide="{{ $item->icon }}"></i>
                            </span>

                            <div>
                                <h4 class="text-base font-black text-slate-950">{{ $item->nama }}</h4>
                                <p class="mt-1 line-clamp-2 text-sm leading-6 text-slate-500">
                                    {{ $item->deskripsi }}
                                </p>
                                <p class="mt-3 text-sm font-bold text-blue-700">
                                    Mulai Rp {{ number_format($item->harga_dasar, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <a href="{{ route('layanan.index') }}" class="hidden rounded-2xl border border-slate-200 p-3 text-slate-600 transition hover:border-blue-500 hover:text-blue-600 sm:block">
                            <i data-lucide="arrow-up-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
