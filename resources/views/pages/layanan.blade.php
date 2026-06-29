@extends('layouts.aplikasi', ['judul' => 'Layanan'])

@section('konten')
    <section class="mb-8 grid gap-5 lg:grid-cols-[1.45fr_0.55fr]">
        <div class="kartu relative overflow-hidden rounded-[2.4rem] p-6 sm:p-8">
            <div class="hero-ornamen"></div>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-sm font-black text-blue-700">
                    <i data-lucide="sparkles" class="h-4 w-4"></i>
                    <span>Daftar Layanan</span>
                </div>

                <h2 class="mt-5 max-w-3xl text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    Pilih layanan AC sesuai kebutuhan pelanggan.
                </h2>

                <p class="mt-4 max-w-3xl text-sm leading-7 text-slate-600">
                    Setiap layanan memiliki tarif jarak sendiri. Harga akhir dihitung dari harga dasar layanan ditambah tarif jarak berdasarkan lokasi tujuan seperti Bekasi, Jakarta, Bogor, Tangerang, Banten, dan Cikarang.
                </p>

                <div class="mt-6 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-3xl border border-slate-200/80 bg-white/80 p-4 shadow-sm">
                        <div class="flex items-center gap-3">
                            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-600 text-white">
                                <i data-lucide="wrench" class="h-5 w-5"></i>
                            </span>
                            <div>
                                <p class="text-xs font-bold text-slate-400">Layanan</p>
                                <p class="text-lg font-black text-slate-950">Profesional</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-slate-200/80 bg-white/80 p-4 shadow-sm">
                        <div class="flex items-center gap-3">
                            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-950 text-white">
                                <i data-lucide="map-pinned" class="h-5 w-5"></i>
                            </span>
                            <div>
                                <p class="text-xs font-bold text-slate-400">Tarif</p>
                                <p class="text-lg font-black text-slate-950">Per Lokasi</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-slate-200/80 bg-white/80 p-4 shadow-sm">
                        <div class="flex items-center gap-3">
                            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-600 text-white">
                                <i data-lucide="shield-check" class="h-5 w-5"></i>
                            </span>
                            <div>
                                <p class="text-xs font-bold text-slate-400">Pesanan</p>
                                <p class="text-lg font-black text-slate-950">Aman</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kartu-gelap relative overflow-hidden rounded-[2.4rem] p-6">
            <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-blue-500/20 blur-2xl"></div>
            <div class="absolute -bottom-10 -left-10 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>

            <div class="relative z-10 flex items-center gap-4">
                <span class="flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-600 text-white shadow-lg shadow-blue-900/20">
                    <i data-lucide="map-pin" class="h-7 w-7"></i>
                </span>

                <div>
                    <p class="text-sm font-bold text-white/55">Pusat Toko</p>
                    <p class="text-3xl font-black text-white">Bekasi</p>
                </div>
            </div>

            <div class="relative z-10 mt-6 rounded-3xl border border-white/10 bg-white/10 p-4">
                <p class="text-sm leading-6 text-white/70">
                    Tarif jarak berbeda untuk setiap layanan dan lokasi. Area layanan tersedia untuk Bekasi, Jakarta, Bogor, Tangerang, Banten, dan Cikarang.
                </p>
            </div>
        </div>
    </section>

    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach($layanan as $item)
            @php
                $punyaTarif = $item->tarifJarak->isNotEmpty();
            @endphp

            <form action="{{ route('pesanan.store') }}" method="POST" class="kartu kartu-hover flex h-full flex-col rounded-[2rem] p-6">
                @csrf

                <input type="hidden" name="layanan_id" value="{{ $item->id }}">

                <div class="flex items-start justify-between gap-4">
                    <span class="flex h-16 w-16 items-center justify-center rounded-[1.6rem] bg-gradient-to-br from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-600/25">
                        <i data-lucide="{{ $item->icon }}" class="h-7 w-7"></i>
                    </span>

                    @if($item->wajib_merk)
                        <span class="inline-flex items-center gap-2 rounded-full border border-yellow-200 bg-yellow-50 px-3 py-1.5 text-xs font-black text-yellow-700">
                            <i data-lucide="tag" class="h-3.5 w-3.5"></i>
                            <span>Wajib Merk</span>
                        </span>
                    @else
                        <span class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-3 py-1.5 text-xs font-black text-blue-700">
                            <i data-lucide="check-circle-2" class="h-3.5 w-3.5"></i>
                            <span>Aktif</span>
                        </span>
                    @endif
                </div>

                <div class="mt-5">
                    <h3 class="text-xl font-black text-slate-950">{{ $item->nama }}</h3>

                    <p class="mt-2 min-h-16 text-sm leading-7 text-slate-600">
                        {{ $item->deskripsi }}
                    </p>
                </div>

                <div class="mt-5 rounded-3xl border border-slate-200/80 bg-slate-50/80 p-4">
                    <p class="text-xs font-black uppercase tracking-wide text-slate-400">Harga Dasar</p>
                    <p class="mt-1 text-3xl font-black text-slate-950">
                        Rp {{ number_format($item->harga_dasar, 0, ',', '.') }}
                    </p>
                </div>

                <div class="mt-5 space-y-4">
                    <div>
                        <label class="label-form">Lokasi dan Tarif Jarak</label>

                        <div class="relative mt-2">
                            <select name="tarif_jarak_layanan_id" class="select-form w-full appearance-none rounded-2xl border border-slate-200 bg-white py-3 pl-16 pr-12 text-sm font-bold text-slate-700 shadow-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100 disabled:cursor-not-allowed disabled:bg-slate-100 disabled:text-slate-400" required @disabled(!$punyaTarif)>
                                @forelse($item->tarifJarak as $tarif)
                                    <option value="{{ $tarif->id }}" @selected(old('tarif_jarak_layanan_id') == $tarif->id)>
                                        {{ $tarif->lokasi->kota }} - Rp {{ number_format($tarif->harga_jarak, 0, ',', '.') }}
                                    </option>
                                @empty
                                    <option value="">Tarif jarak belum tersedia</option>
                                @endforelse
                            </select>

                            <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                                <i data-lucide="chevron-down" class="h-5 w-5"></i>
                            </span>
                        </div>
                    </div>

                    @if($item->wajib_merk)
                        <div>
                            <label class="label-form">Merk AC</label>

                            <div class="relative mt-2">
                                <select name="merk_ac_id" class="select-form w-full appearance-none rounded-2xl border border-slate-200 bg-white py-3 pl-16 pr-12 text-sm font-bold text-slate-700 shadow-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" required>
                                    <option value="">Pilih merk AC</option>
                                    @foreach($merkAc as $merk)
                                        <option value="{{ $merk->id }}" @selected(old('merk_ac_id') == $merk->id)>
                                            {{ $merk->nama }}
                                        </option>
                                    @endforeach
                                </select>

                                <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <i data-lucide="chevron-down" class="h-5 w-5"></i>
                                </span>
                            </div>
                        </div>
                    @else
                        <input type="hidden" name="merk_ac_id" value="">
                    @endif

                    <div>
                        <label class="label-form">Jumlah</label>

                        <div class="relative mt-2">
                            <input type="number" name="jumlah" value="{{ old('jumlah', 1) }}" min="1" class="input-form w-full rounded-2xl border border-slate-200 bg-white py-3 pl-16 pr-4 text-sm font-bold text-slate-700 shadow-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100" required>
                        </div>
                    </div>

                    <div>
                        <label class="label-form">Catatan</label>

                        <div class="relative mt-2">
                            <textarea name="catatan" rows="3" class="textarea-form w-full resize-none rounded-2xl border border-slate-200 bg-white py-3 pl-16 pr-4 text-sm font-medium leading-6 text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-blue-400 focus:ring-4 focus:ring-blue-100" placeholder="Contoh: AC 1 PK, kamar depan, outdoor sulit dijangkau.">{{ old('catatan') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="mt-auto pt-5">
                    <button class="{{ $punyaTarif ? 'tombol-primer' : 'cursor-not-allowed bg-slate-200 text-slate-500' }} flex w-full items-center justify-center gap-2 rounded-2xl px-5 py-3 font-black transition" @disabled(!$punyaTarif)>
                        <i data-lucide="{{ $punyaTarif ? 'shopping-cart' : 'circle-off' }}" class="h-5 w-5"></i>
                        <span>{{ $punyaTarif ? 'Tambah ke Pesanan' : 'Tarif Belum Tersedia' }}</span>
                    </button>
                </div>
            </form>
        @endforeach
    </div>
@endsection
