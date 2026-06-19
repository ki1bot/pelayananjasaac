<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $judul ?? 'Pelayanan Jasa AC' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans">
    <div id="overlaySidebar" class="overlay-sidebar fixed inset-0 z-40 bg-slate-950/50 lg:hidden" onclick="toggleSidebar()"></div>

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

            <button type="button" class="rounded-xl p-2 hover:bg-white/10 lg:hidden" onclick="toggleSidebar()">
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

    <div class="konten-aplikasi">
        <header class="sticky top-0 z-30 border-b border-slate-200/80 bg-white/85 backdrop-blur-xl">
            <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-4">
                    <button type="button" class="rounded-2xl border border-slate-200 bg-white p-3 shadow-sm lg:hidden" onclick="toggleSidebar()">
                        <i data-lucide="menu"></i>
                    </button>

                    <div>
                        <p class="text-xs font-medium text-slate-500">Pusat toko: Bekasi</p>
                        <h1 class="text-lg font-bold text-slate-950">{{ $judul ?? 'Pelayanan Jasa AC' }}</h1>
                    </div>
                </div>

                <div class="relative">
                    @auth
                        <button type="button" onclick="toggleProfile()" class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-950 text-white shadow-lg shadow-slate-900/20">
                            <i data-lucide="user"></i>
                        </button>

                        <div id="profileMenu" class="absolute right-0 mt-3 hidden w-64 rounded-3xl border border-slate-200 bg-white p-3 shadow-2xl">
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

        <main class="mx-auto min-h-[calc(100vh-10rem)] max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-5 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @yield('konten')
        </main>

        <footer class="border-t border-slate-200 bg-white">
            <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-6 text-center text-sm text-slate-500 sm:px-6 lg:px-8">
                <p class="font-semibold text-slate-700">Pelayanan Jasa AC Bekasi</p>
                <p>© {{ date('Y') }} Melayani Bekasi, Jakarta, Bogor, dan Tangerang.</p>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        lucide.createIcons();

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlaySidebar');

            sidebar.classList.toggle('sidebar-aktif');
            overlay.classList.toggle('overlay-aktif');
        }

        function toggleProfile() {
            const menu = document.getElementById('profileMenu');
            menu.classList.toggle('hidden');
        }

        function togglePassword(id, iconId) {
            const input = document.getElementById(id);
            const icon = document.getElementById(iconId);

            input.type = input.type === 'password' ? 'text' : 'password';
            icon.setAttribute('data-lucide', input.type === 'password' ? 'eye' : 'eye-off');

            lucide.createIcons();
        }

        document.addEventListener('click', function (event) {
            const menu = document.getElementById('profileMenu');

            if (!menu) {
                return;
            }

            const isProfileButton = event.target.closest('[onclick="toggleProfile()"]');
            const isInsideMenu = event.target.closest('#profileMenu');

            if (!isProfileButton && !isInsideMenu) {
                menu.classList.add('hidden');
            }
        });
    </script>

    @stack('script')
</body>
</html>
