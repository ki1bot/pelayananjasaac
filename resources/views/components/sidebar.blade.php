<button type="button" data-sidebar-open aria-label="Buka sidebar" class="fixed left-4 top-2 z-[70] flex h-12 w-12 items-center justify-center rounded-2xl border border-slate-200/80 bg-white/95 text-slate-700 shadow-xl shadow-slate-900/10 backdrop-blur-xl transition hover:border-blue-300 hover:text-blue-600 hover:shadow-2xl sm:left-5 sm:top-3">
    <i data-lucide="menu"></i>
</button>

<div data-sidebar-overlay class="overlay-sidebar fixed inset-0 z-50 bg-slate-950/60 backdrop-blur-sm lg:hidden"></div>

<aside id="sidebar" class="sidebar fixed left-0 top-0 z-[60] flex h-screen w-[86vw] max-w-80 flex-col overflow-y-auto text-white lg:w-72 lg:max-w-72">
    <div class="relative z-10 flex h-20 shrink-0 items-center justify-between gap-4 border-b border-white/10 px-5">
        <a href="{{ route('beranda') }}" data-sidebar-link class="min-w-0 flex-1">
            <span class="block truncate text-base font-black leading-tight">{{ $judul ?? 'Pelayanan Jasa AC' }}</span>
        </a>

        <button type="button" data-sidebar-close aria-label="Tutup sidebar" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl text-white/70 transition hover:bg-white/10 hover:text-white">
            <i data-lucide="x"></i>
        </button>
    </div>

    <div class="relative z-10 shrink-0 px-4 py-5">
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
</aside>
