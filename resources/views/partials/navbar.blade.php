<header class="sticky top-0 z-30 border-b border-slate-200/80 bg-white/80 backdrop-blur-2xl">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4">
            <button type="button" data-sidebar-toggle class="rounded-2xl border border-slate-200 bg-white p-3 text-slate-700 shadow-sm transition hover:border-blue-300 hover:text-blue-600 hover:shadow-md">
                <i data-lucide="menu"></i>
            </button>

            <div>
                <p class="text-xs font-semibold text-slate-500">Pusat toko: Bekasi</p>
                <h1 class="text-lg font-black text-slate-950">{{ $judul ?? 'Pelayanan Jasa AC' }}</h1>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('keranjang.index') }}" class="hidden rounded-2xl border border-slate-200 bg-white p-3 text-slate-700 shadow-sm transition hover:border-blue-300 hover:text-blue-600 sm:flex">
                <i data-lucide="shopping-cart"></i>
            </a>

            <div class="relative">
                @auth
                    <button type="button" data-profile-toggle class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-950 text-white shadow-xl shadow-slate-900/20 transition hover:scale-105">
                        <i data-lucide="user"></i>
                    </button>

                    <div data-profile-menu class="absolute right-0 mt-3 hidden w-72 rounded-[1.7rem] border border-slate-200 bg-white p-3 shadow-2xl">
                        <div class="rounded-2xl bg-slate-50 px-4 py-3">
                            <p class="text-sm font-black text-slate-950">{{ auth()->user()->nama }}</p>
                            <p class="mt-1 truncate text-xs text-slate-500">{{ auth()->user()->email }}</p>
                        </div>

                        <a href="{{ route('profil.ubah-password') }}" class="mt-2 flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-100">
                            <i data-lucide="key-round"></i>
                            <span>Ubah Password</span>
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold text-red-600 transition hover:bg-red-50">
                                <i data-lucide="log-out"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-950 text-white shadow-xl shadow-slate-900/20 transition hover:scale-105">
                        <i data-lucide="user"></i>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>
