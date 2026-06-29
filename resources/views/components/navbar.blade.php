@php
    $kelasLebarNavbar = ($lebar ?? 'normal') === 'penuh'
        ? 'max-w-full lg:max-w-[1700px]'
        : 'max-w-full lg:max-w-7xl';
@endphp

<header id="navbarAplikasi" class="navbar-aplikasi sticky top-0 z-40 w-full max-w-full border-b border-white/60 bg-white/72 backdrop-blur-2xl">
    <div class="mx-auto flex h-20 w-full min-w-0 {{ $kelasLebarNavbar }} items-center justify-between gap-4 px-3 sm:px-6 lg:px-8">
        <div class="flex shrink-0 items-center">
            <button type="button" data-sidebar-open aria-label="Buka sidebar" class="flex h-12 w-12 items-center justify-center rounded-2xl border border-slate-200/80 bg-white/95 text-slate-700 shadow-lg shadow-slate-900/10 backdrop-blur-xl transition hover:border-blue-300 hover:text-blue-600 hover:shadow-xl">
                <i data-lucide="menu" class="h-5 w-5"></i>
            </button>
        </div>

        <div class="flex shrink-0 items-center gap-3">
            @auth
                <a href="{{ route('pesanan.index') }}" class="hidden items-center gap-2 rounded-2xl border border-slate-200/80 bg-white/85 px-4 py-3 text-sm font-black text-slate-700 shadow-sm transition hover:border-blue-300 hover:text-blue-600 sm:flex">
                    <i data-lucide="clipboard-list" class="h-5 w-5"></i>
                    <span>Pesanan</span>
                </a>
            @endauth

            <div class="relative">
                @auth
                    <button type="button" data-profile-toggle aria-label="Menu pengguna" class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-950 text-white shadow-xl shadow-slate-900/20 ring-4 ring-white/70 transition hover:scale-105">
                        <i data-lucide="user" class="h-5 w-5"></i>
                    </button>

                    <div data-profile-menu class="absolute right-0 mt-3 hidden w-[calc(100vw-2rem)] max-w-72 rounded-[1.7rem] border border-white/70 bg-white/90 p-3 shadow-2xl backdrop-blur-2xl sm:w-72">
                        <div class="rounded-2xl bg-slate-50/90 px-4 py-3">
                            <p class="text-sm font-black text-slate-950">{{ auth()->user()->nama }}</p>
                            <p class="mt-1 truncate text-xs text-slate-500">{{ auth()->user()->email }}</p>

                            <span class="mt-3 inline-flex rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                                {{ strtoupper(auth()->user()->role) }}
                            </span>
                        </div>

                        <a href="{{ route('profil.ubah-password') }}" class="mt-2 flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-100">
                            <i data-lucide="key-round" class="h-5 w-5"></i>
                            <span>Ubah Password</span>
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold text-red-600 transition hover:bg-red-50">
                                <i data-lucide="log-out" class="h-5 w-5"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" aria-label="Login" class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-950 text-white shadow-xl shadow-slate-900/20 ring-4 ring-white/70 transition hover:scale-105">
                        <i data-lucide="user" class="h-5 w-5"></i>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>
