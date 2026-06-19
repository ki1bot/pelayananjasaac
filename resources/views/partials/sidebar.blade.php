<div id="overlaySidebar" data-sidebar-overlay class="overlay-sidebar fixed inset-0 z-40 bg-slate-950/50 lg:hidden"></div>

<aside id="sidebar" class="sidebar fixed left-0 top-0 z-50 h-screen w-72 overflow-y-auto text-white">
    <div class="flex h-20 items-center justify-between border-b border-white/10 px-5">
        <a href="{{ route('beranda') }}" class="flex items-center gap-3">
            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-600">
                <i data-lucide="wind"></i>
            </span>

            <span>
                <span class="block text-base font-bold leading-tight">Jasa AC</span>
                <span class="block text-xs text-white/55">Bekasi Service Center</span>
            </span>
        </a>

        <button type="button" data-sidebar-toggle class="rounded-xl p-2 hover:bg-white/10 lg:hidden">
            <i data-lucide="x"></i>
        </button>
    </div>

    <div class="px-4 py-5">
        <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-[0.22em] text-white/40">Menu Utama</p>

        <nav class="space-y-2">
            <a href="{{ route('beranda') }}" class="nav-link {{ request()->routeIs('beranda') ? 'nav-link-aktif' : '' }}">
                <i data-lucide="home"></i>
                <span>Beranda</span>
            </a>

            <a href="{{ route('layanan.index') }}" class="nav-link {{ request()->routeIs('layanan.*') ? 'nav-link-aktif' : '' }}">
                <i data-lucide="wrench"></i>
                <span>Layanan</span>
            </a>

            <a href="{{ route('keranjang.index') }}" class="nav-link {{ request()->routeIs('keranjang.*') ? 'nav-link-aktif' : '' }}">
                <i data-lucide="shopping-cart"></i>
                <span>Keranjang</span>
            </a>

            <a href="{{ route('pembayaran.index') }}" class="nav-link {{ request()->routeIs('pembayaran.*') ? 'nav-link-aktif' : '' }}">
                <i data-lucide="credit-card"></i>
                <span>Pembayaran</span>
            </a>
        </nav>
    </div>

    <div class="mx-4 mt-4 rounded-3xl border border-white/10 bg-white/5 p-4">
        <div class="flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-600/25 text-blue-200">
                <i data-lucide="map-pin"></i>
            </span>

            <div>
                <p class="text-sm font-semibold">Pusat Toko</p>
                <p class="text-xs text-white/55">Bekasi</p>
            </div>
        </div>

        <div class="mt-4 space-y-2 text-sm text-white/65">
            <p>Bekasi</p>
            <p>Jakarta</p>
            <p>Bogor</p>
            <p>Tangerang</p>
        </div>
    </div>
</aside>
