<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $judul ?? 'Pelayanan Jasa AC' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans">
    @include('partials.sidebar')

    <div id="kontenAplikasi" class="konten-aplikasi">
        @include('partials.navbar')

        <main class="mx-auto min-h-[calc(100vh-10rem)] max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="animasi-masuk mb-5 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="animasi-masuk mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="animasi-masuk mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="animasi-masuk">
                @yield('konten')
            </div>
        </main>

        @include('partials.footer')
    </div>
</body>
</html>
