<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $judul ?? 'Pelayanan Jasa AC' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans">
    <div class="min-h-screen">
        <aside id="sidebar" class="fixed left-0 top-0 z-40 h-screen w-72 sidebar-nonaktif transisi-sidebar bg-slate-950 text-white lg:sidebar-aktif">
            <div class="flex h-16 items-center justify-between border-b border-white/10 px-5">
                <a href="{{ route('beranda') }}" class="text-xl font-bold">Jasa AC Bekasi</a>
                <button type="button" class="lg:hidden" onclick="toggleSidebar()">
                    <i data-lucide="x"></i>
                </button>
            </div>

            <nav class="space-y-2 px-4 py-5">
                <a href="{{ route('beranda') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 hover:bg-white/10">
                    <i data-lucide="home"></i>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('layanan.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 hover:bg-white/10">
                    <i data-lucide="wind"></i>
                    <span>Layanan</span>
                </a>
                <a href="{{ route('keranjang.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 hover:bg-white/10">
                    <i data-lucide="shopping-cart"></i>
                    <span>Keranjang</span>
                </a>
                <a href="{{ route('pembayaran.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 hover:bg-white/10">
                    <i data-lucide="credit-card"></i>
                    <span>Pembayaran</span>
                </a>
            </nav>
        </aside>

        <div class="lg:pl-72">
            <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-slate-200 bg-white/80 px-5 backdrop-blur">
                <button type="button" class="lg:hidden" onclick="toggleSidebar()">
                    <i data-lucide="menu"></i>
                </button>

                <div>
                    <p class="text-sm text-slate-500">Pusat toko: Bekasi</p>
                    <h1 class="text-lg font-semibold text-slate-900">{{ $judul ?? 'Pelayanan Jasa AC' }}</h1>
                </div>

                <div class="relative">
                    @auth
                        <button type="button" onclick="toggleProfile()" class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 text-white">
                            <i data-lucide="user"></i>
                        </button>
                        <div id="profileMenu" class="absolute right-0 mt-3 hidden w-56 rounded-2xl bg-white p-3 shadow-xl">
                            <p class="border-b pb-3 text-sm font-semibold text-slate-900">{{ auth()->user()->nama }}</p>
                            <a href="{{ route('profil.ubah-password') }}" class="mt-2 flex items-center gap-2 rounded-xl px-3 py-2 text-sm hover:bg-slate-100">
                                <i data-lucide="key-round"></i>
                                <span>Ubah Password</span>
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <i data-lucide="log-out"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 text-white">
                            <i data-lucide="user"></i>
                        </a>
                    @endauth
                </div>
            </header>

            <main class="p-5">
                @if(session('success'))
                    <div class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">{{ session('error') }}</div>
                @endif

                @yield('konten')
            </main>

            <footer class="border-t bg-white px-5 py-6 text-center text-sm text-slate-500">
                <p>© {{ date('Y') }} Pelayanan Jasa AC Bekasi. Melayani Bekasi, Jakarta, Bogor, dan Tangerang.</p>
            </footer>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        lucide.createIcons();

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('sidebar-nonaktif');
            sidebar.classList.toggle('sidebar-aktif');
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
    </script>

    @stack('script')
</body>
</html>
