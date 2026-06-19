@extends('layouts.aplikasi')

@section('konten')
    <div class="mx-auto max-w-md">
        <div class="kartu rounded-3xl p-6">
            <h2 class="text-2xl font-bold text-slate-950">Login</h2>

            <form action="{{ route('login.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf

                <div>
                    <label class="text-sm font-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" required>
                </div>

                <div>
                    <label class="text-sm font-semibold">Password</label>
                    <div class="relative mt-2">
                        <input id="password" type="password" name="password" class="w-full rounded-xl border border-slate-300 px-4 py-3 pr-12" required>
                        <button type="button" onclick="togglePassword('password', 'iconPassword')" class="absolute right-4 top-3">
                            <i id="iconPassword" data-lucide="eye"></i>
                        </button>
                    </div>
                </div>

                <button class="w-full rounded-xl tombol-primer px-5 py-3 font-semibold">Login</button>
            </form>

            <div class="mt-5 grid gap-3">
                <a href="{{ route('sosial.redirect', 'google') }}" class="rounded-xl border border-slate-300 px-5 py-3 text-center font-semibold">Login dengan Google</a>
                <a href="{{ route('sosial.redirect', 'facebook') }}" class="rounded-xl border border-slate-300 px-5 py-3 text-center font-semibold">Login dengan Facebook</a>
            </div>

            <p class="mt-5 text-center text-sm text-slate-600">
                Belum punya akun?
                <a href="{{ route('registrasi') }}" class="font-semibold text-blue-600">Registrasi</a>
            </p>
        </div>
    </div>
@endsection
