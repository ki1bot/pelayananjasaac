<header class="sticky top-0 z-30 border-b border-slate-200/80 bg-white/85 backdrop-blur-xl">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4">
            <button type="button" data-sidebar-toggle class="rounded-2xl border border-slate-200 bg-white p-3 shadow-sm lg:hidden">
                <i data-lucide="menu"></i>
            </button>

            <div>
                <p class="text-xs font-medium text-slate-500">Pusat toko: Bekasi</p>
                <h1 class="text-lg font-bold text-slate-950">{{ $judul ?? 'Pelayanan Jasa AC' }}</h1>
            </div>
        </div>

        <div class="relative">
            @auth
                <button type="button" data-profile-toggle class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-950 text-white shadow-lg shadow-slate-900/20">
                    <i data-lucide="user"></i>
                </button>

                <div data-profile-menu class="absolute right-0 mt-3 hidden w-64 rounded-3xl border border-slate-200 bg-white p-3 shadow-2xl">
                    <div class="border-b border-slate-100 px-3 pb-3">
                        <p class="text-sm font-bold text-slate-950">{{ auth()->user()->nama }}</p>
                        <p class="mt-1 truncate text-xs text-slate-500">{{ auth()->user()->email }}</p>
                    </div>

                    <a href="{{ route('profil.ubah-password') }}" class="mt-2 flex items-center gap-3 rounded-2xl px-3 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                        <i data-lucide="key-round"></i>
                        <span>Ubah Password</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex w-full items-center gap-3 rounded-2xl px-3 py-3 text-sm font-semibold text-red-600 hover:bg-red-50">
                            <i data-lucide="log-out"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-950 text-white shadow-lg shadow-slate-900/20">
                    <i data-lucide="user"></i>
                </a>
            @endauth
        </div>
    </div>
</header>
