@extends('layouts.aplikasi', ['judul' => 'Pelayanan Jasa AC', 'lebar' => 'penuh'])

@section('konten')
    @php
        $labelGrafik = $grafik->pluck('nama')->values();
        $dataGrafik = $grafik->pluck('harga')->values();
    @endphp

    <div id="dataGrafikProduk" class="hidden" data-labels='@json($labelGrafik)' data-values='@json($dataGrafik)'></div>

    <section class="grid w-full min-w-0 max-w-full gap-5 overflow-hidden xl:grid-cols-[1.75fr_0.75fr]">
        <div class="kartu relative w-full min-w-0 overflow-hidden rounded-[1.6rem] sm:rounded-[2.4rem]">
            <div class="hero-ornamen"></div>

            <div class="relative grid w-full min-w-0 gap-6 p-5 sm:gap-10 sm:p-9 xl:grid-cols-[1.35fr_0.65fr] xl:items-center">
                <div class="w-full min-w-0">
                    <h2 class="mt-2 max-w-5xl break-words text-[2.15rem] font-black leading-[1.08] tracking-tight text-slate-950 sm:mt-5 sm:text-5xl 2xl:text-7xl">
                        Service, beli, dan jual AC jadi lebih mudah.
                    </h2>

                    <p class="mt-5 max-w-4xl break-words text-sm leading-7 text-slate-600 sm:mt-6 sm:text-base sm:leading-8 2xl:text-lg">
                        Buat pesanan layanan AC, pilih lokasi, tambahkan merk AC jika diperlukan, lalu admin akan meninjau dan memproses pesanan kamu sampai selesai.
                    </p>

                    <div class="mt-6 flex w-full flex-col gap-3 sm:mt-8 sm:flex-row">
                        <a href="{{ route('layanan.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl tombol-primer px-6 py-3 font-black">
                            <i data-lucide="calendar-plus" class="h-5 w-5"></i>
                            <span>Pesan Layanan</span>
                        </a>

                        @auth
                            <a href="{{ route('pesanan.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl tombol-outline px-6 py-3 font-black">
                                <i data-lucide="clipboard-list" class="h-5 w-5"></i>
                                <span>Pesanan Saya</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl tombol-outline px-6 py-3 font-black">
                                <i data-lucide="log-in" class="h-5 w-5"></i>
                                <span>Login Dahulu</span>
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="kartu-gelap w-full min-w-0 rounded-[1.5rem] p-5 sm:rounded-[2.2rem] sm:p-6">
                    <div class="relative z-10">
                        <div class="flex items-center justify-between">
                            <div class="min-w-0">
                                <p class="text-sm text-white/55">Mulai dari</p>
                                <p class="mt-1 break-words text-4xl font-black sm:text-5xl">Rp75.000</p>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-3 sm:mt-7">
                            <div class="min-w-0 rounded-3xl border border-white/10 bg-white/[0.08] p-4">
                                <p class="text-3xl font-black">6</p>
                                <p class="mt-1 text-xs text-white/55">Area kota</p>
                            </div>

                            <div class="min-w-0 rounded-3xl border border-white/10 bg-white/[0.08] p-4">
                                <p class="text-3xl font-black">{{ $layanan->count() }}</p>
                                <p class="mt-1 text-xs text-white/55">Jenis layanan</p>
                            </div>
                        </div>

                        <div class="mt-4 rounded-3xl border border-white/10 bg-white/[0.06] p-4">
                            <p class="text-sm font-black text-white">Alur Pesanan</p>
                            <div class="mt-3 grid gap-2 text-xs font-bold text-white/65">
                                <span class="rounded-2xl bg-white/[0.06] px-3 py-2">Draft</span>
                                <span class="rounded-2xl bg-white/[0.06] px-3 py-2">Sedang Ditinjau</span>
                                <span class="rounded-2xl bg-white/[0.06] px-3 py-2">Diproses</span>
                                <span class="rounded-2xl bg-white/[0.06] px-3 py-2">Selesai</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kartu w-full min-w-0 rounded-[1.6rem] p-5 sm:rounded-[2.4rem] sm:p-8">
            <div class="flex min-w-0 items-center justify-between gap-4">
                <div class="min-w-0">
                    <p class="text-sm font-black text-blue-600">Area Layanan</p>
                    <h3 class="mt-2 break-words text-2xl font-black text-slate-950">Jangkauan Kota</h3>
                </div>

                <span class="badge-icon">
                    <i data-lucide="map-pin"></i>
                </span>
            </div>

            <div class="mt-6 space-y-3">
                <div class="flex min-w-0 items-center justify-between gap-3 rounded-2xl bg-white/70 px-4 py-4 shadow-sm">
                    <span class="min-w-0 break-words font-black text-slate-800">Bekasi</span>
                    <span class="shrink-0 text-xs font-bold text-blue-600 sm:text-sm">Pusat toko</span>
                </div>

                <div class="flex min-w-0 items-center justify-between gap-3 rounded-2xl bg-white/70 px-4 py-4 shadow-sm">
                    <span class="min-w-0 break-words font-black text-slate-800">Jakarta</span>
                    <span class="shrink-0 text-xs font-semibold text-slate-500 sm:text-sm">Jarak sedang</span>
                </div>

                <div class="flex min-w-0 items-center justify-between gap-3 rounded-2xl bg-white/70 px-4 py-4 shadow-sm">
                    <span class="min-w-0 break-words font-black text-slate-800">Cikarang</span>
                    <span class="shrink-0 text-xs font-semibold text-slate-500 sm:text-sm">Jarak sedang</span>
                </div>

                <div class="flex min-w-0 items-center justify-between gap-3 rounded-2xl bg-white/70 px-4 py-4 shadow-sm">
                    <span class="min-w-0 break-words font-black text-slate-800">Bogor</span>
                    <span class="shrink-0 text-xs font-semibold text-slate-500 sm:text-sm">Jarak jauh</span>
                </div>

                <div class="flex min-w-0 items-center justify-between gap-3 rounded-2xl bg-white/70 px-4 py-4 shadow-sm">
                    <span class="min-w-0 break-words font-black text-slate-800">Tangerang</span>
                    <span class="shrink-0 text-xs font-semibold text-slate-500 sm:text-sm">Jarak jauh</span>
                </div>

                <div class="flex min-w-0 items-center justify-between gap-3 rounded-2xl bg-white/70 px-4 py-4 shadow-sm">
                    <span class="min-w-0 break-words font-black text-slate-800">Banten</span>
                    <span class="shrink-0 text-xs font-semibold text-slate-500 sm:text-sm">Jarak jauh</span>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 grid w-full min-w-0 max-w-full gap-5 overflow-hidden xl:mt-6 xl:grid-cols-[1.45fr_1.05fr]">
        <div class="kartu w-full min-w-0 rounded-[1.6rem] p-5 sm:rounded-[2.4rem] sm:p-8">
            <div class="flex min-w-0 flex-col justify-between gap-3 sm:flex-row sm:items-center">
                <div class="min-w-0">
                    <p class="text-sm font-black text-blue-600">Statistik</p>
                    <h3 class="mt-2 break-words text-2xl font-black text-slate-950">Grafik Produk</h3>
                    <p class="mt-2 break-words text-sm leading-6 text-slate-500">
                        Perbandingan harga dasar setiap layanan dari tabel layanan.
                    </p>
                </div>

                <div class="w-fit rounded-2xl bg-blue-50 px-4 py-2 text-sm font-black text-blue-700">
                    Harga dasar
                </div>
            </div>

            <div class="mt-6 h-[260px] w-full max-w-full overflow-hidden rounded-3xl sm:h-[340px] xl:h-[420px]">
                <canvas id="grafikProduk"></canvas>
            </div>
        </div>

        <div class="grid w-full min-w-0 max-w-full grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-2">
            @foreach($layanan as $item)
                <div class="kartu kartu-hover w-full min-w-0 rounded-[1.5rem] p-5 sm:rounded-[1.9rem]">
                    <div class="flex min-w-0 items-start justify-between gap-4">
                        <div class="flex min-w-0 items-start gap-4">
                            <span class="badge-icon">
                                <i data-lucide="{{ $item->icon }}"></i>
                            </span>

                            <div class="min-w-0 flex-1">
                                <h4 class="break-words text-base font-black text-slate-950">{{ $item->nama }}</h4>
                                <p class="mt-1 break-words text-sm leading-6 text-slate-500">
                                    {{ $item->deskripsi }}
                                </p>
                                <p class="mt-3 break-words text-sm font-black text-blue-700">
                                    Mulai Rp {{ number_format($item->harga_dasar, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <a href="{{ route('layanan.index') }}" class="hidden shrink-0 rounded-2xl border border-slate-200 bg-white/80 p-3 text-slate-600 transition hover:border-blue-500 hover:text-blue-600 2xl:block">
                            <i data-lucide="arrow-up-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
