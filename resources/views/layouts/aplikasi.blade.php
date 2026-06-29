<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rifqi | Pelayanan Jasa Ac</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logoKibot.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/logoKibot.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/logoKibot.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen w-full overflow-x-hidden font-sans">
    @include('components.sidebar')

    <div id="kontenAplikasi" class="konten-aplikasi w-full min-w-0 max-w-full overflow-x-hidden">
        @include('components.navbar')

        @php
            $kelasLebarKonten = ($lebar ?? 'normal') === 'penuh'
                ? 'max-w-full lg:max-w-[1700px]'
                : 'max-w-full lg:max-w-7xl';
        @endphp

        <main class="mx-auto min-h-[calc(100vh-10rem)] w-full min-w-0 {{ $kelasLebarKonten }} overflow-x-hidden px-3 py-5 sm:px-6 sm:py-6 lg:px-8">
            @if(session('success'))
                <div class="animasi-masuk mb-5 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-bold text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="animasi-masuk mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-bold text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="animasi-masuk mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    @foreach($errors->all() as $error)
                        <p class="font-semibold">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="animasi-masuk w-full min-w-0 max-w-full overflow-x-hidden">
                @yield('konten')
            </div>
        </main>

        @include('components.footer')
    </div>

    @stack('script')
</body>
</html>
