<div data-sidebar-overlay class="overlay-sidebar fixed inset-0 z-50 bg-slate-950/60 backdrop-blur-sm lg:hidden"></div>

<aside id="sidebar" class="sidebar fixed left-0 top-0 z-[60] flex h-screen w-[86vw] max-w-80 flex-col overflow-y-auto text-white lg:w-72 lg:max-w-72">
    <div class="relative z-10 flex h-20 shrink-0 items-center justify-between gap-4 border-b border-white/10 px-5">
        <a href="{{ route('beranda') }}" data-sidebar-link class="min-w-0 flex-1">
            <span class="block truncate text-base font-black leading-tight">{{ $judul ?? 'Pelayanan Jasa AC' }}</span>
        </a>

        <button type="button" data-sidebar-close aria-label="Tutup sidebar" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl text-white/70 transition hover:bg-white/10 hover:text-white">
            <i data-lucide="x" class="h-5 w-5"></i>
        </button>
    </div>

    <div class="relative z-10 shrink-0 px-4 py-5">
        <p class="mb-3 px-3 text-xs font-bold uppercase tracking-[0.22em] text-white/40">Menu Utama</p>

        <nav class="space-y-2">
            <a href="{{ route('beranda') }}" data-sidebar-link class="nav-link {{ request()->routeIs('beranda') ? 'nav-link-aktif' : '' }}">
                <i data-lucide="home" class="h-5 w-5"></i>
                <span>Beranda</span>
            </a>

            <a href="{{ route('layanan.index') }}" data-sidebar-link class="nav-link {{ request()->routeIs('layanan.*') ? 'nav-link-aktif' : '' }}">
                <i data-lucide="wrench" class="h-5 w-5"></i>
                <span>Layanan</span>
            </a>

            @auth
                <a href="{{ route('pesanan.index') }}" data-sidebar-link class="nav-link {{ request()->routeIs('pesanan.*') || request()->routeIs('detail-pesanan.*') ? 'nav-link-aktif' : '' }}">
                    <i data-lucide="clipboard-list" class="h-5 w-5"></i>
                    <span>Pesanan Saya</span>
                </a>

                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.pesanan.index') }}" data-sidebar-link class="nav-link {{ request()->routeIs('admin.pesanan.*') ? 'nav-link-aktif' : '' }}">
                        <i data-lucide="shield-check" class="h-5 w-5"></i>
                        <span>Admin Pesanan</span>
                    </a>
                @endif
            @endauth
        </nav>
    </div>
</aside>
