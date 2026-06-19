<div data-sidebar-overlay class="overlay-sidebar fixed inset-0 z-40 bg-slate-950/60 backdrop-blur-sm lg:hidden"></div>

<aside id="sidebar" class="sidebar fixed left-0 top-0 z-50 h-screen w-72 overflow-y-auto text-white">
    <div class="relative z-10 flex h-20 items-center justify-between border-b border-white/10 px-5">
        <a href="{{ route('beranda') }}" data-sidebar-link class="flex items-center gap-3">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-600 shadow-lg shadow-blue-600/25">
                <i data-lucide="wind"></i>
            </span>

            <span>
                <span class="block text-base font-black leading-tight">Jasa AC</span>
                <span class="block text-xs text-white/55">Bekasi Service Center</span>
            </span>
        </a>

        <button type="button" data-sidebar-toggle class="rounded-2xl p-2 text-white/70 transition hover:bg-white/10 hover:text-white">
            <i data-lucide="x"></i>
        </button>
    </div>

    <div class="relative z-10 px-4 py-5">
        <p class="mb-3 px-3 text-xs font-bold uppercase tracking-[0.22em] text-white/40">Menu Utama</p>

        <nav class="space-y-2">
            <a href="{{ route('beranda') }}" data-sidebar-link class="nav-link {{ request()->routeIs('beranda') ? 'nav-link-aktif' : '' }}">
                <i data-lucide="home"></i>
                <span>Beranda</span>
            </a>

            <a href="{{ route('layanan.index') }}" data-sidebar-link class="nav-link {{ request()->routeIs('layanan.*') ? 'nav-link-aktif' : '' }}">
                <i data-lucide="wrench"></i>
                <span>Layanan</span>
            </a>

            @auth
                <a href="{{ route('pesanan.index') }}" data-sidebar-link class="nav-link {{ request()->routeIs('pesanan.*') || request()->routeIs('detail-pesanan.*') ? 'nav-link-aktif' : '' }}">
                    <i data-lucide="clipboard-list"></i>
                    <span>Pesanan Saya</span>
                </a>

                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.pesanan.index') }}" data-sidebar-link class="nav-link {{ request()->routeIs('admin.pesanan.*') ? 'nav-link-aktif' : '' }}">
                        <i data-lucide="shield-check"></i>
                        <span>Admin Pesanan</span>
                    </a>
                @endif
            @endauth
        </nav>
    </div>

    <div class="relative z-10 mx-4 mt-4 rounded-[1.8rem] border border-white/10 bg-white/[0.07] p-4 shadow-2xl backdrop-blur-xl">
        <div class="flex items-center gap-3">
            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-600/25 text-blue-200">
                <i data-lucide="map-pin"></i>
            </span>

            <div>
                <p class="text-sm font-black">Pusat Toko</p>
                <p class="text-xs text-white/55">Bekasi</p>
            </div>
        </div>

        <div class="mt-4 grid grid-cols-2 gap-2 text-sm text-white/70">
            <span class="rounded-xl bg-white/[0.07] px-3 py-2">Bekasi</span>
            <span class="rounded-xl bg-white/[0.07] px-3 py-2">Jakarta</span>
            <span class="rounded-xl bg-white/[0.07] px-3 py-2">Bogor</span>
            <span class="rounded-xl bg-white/[0.07] px-3 py-2">Tangerang</span>
        </div>
    </div>

    <div class="relative z-10 mx-4 my-4 overflow-hidden rounded-[1.8rem] border border-blue-400/20 bg-blue-500/10 p-4">
        <div class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-blue-400/20 blur-2xl"></div>

        <p class="relative text-sm font-black text-blue-100">Sistem Pesanan</p>
        <p class="relative mt-2 text-xs leading-6 text-white/58">
            Pelanggan membuat pesanan. Admin meninjau, memproses, lalu menyelesaikan pesanan.
        </p>
    </div>
</aside>
