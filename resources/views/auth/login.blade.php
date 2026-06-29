@extends('layouts.aplikasi', ['judul' => 'Login'])

@section('konten')
    <div class="halaman-auth">
        <div class="auth-panel kartu w-full max-w-md rounded-[2.4rem] p-6 sm:p-8">
            <div class="text-center">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-50 text-blue-600 shadow-inner">
                    <i data-lucide="log-in"></i>
                </div>

                <h2 class="mt-4 text-3xl font-black text-slate-950">Login</h2>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Masuk untuk membuat pesanan dan melihat status layanan.
                </p>
            </div>

            <form action="{{ route('login.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf

                <div>
                    <label class="label-form">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="input-form mt-2" required>
                </div>

                <div>
                    <label class="label-form">Password</label>
                    <div class="relative mt-2">
                        <input id="password" type="password" name="password" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <button class="w-full rounded-2xl tombol-primer px-5 py-3 font-black">Login</button>
            </form>

            <div class="mt-5 grid gap-3">
                <a href="{{ route('sosial.redirect', 'google') }}" class="flex items-center justify-center gap-3 rounded-2xl tombol-outline px-5 py-3 text-center font-black">
                    <img src="{{ asset('assets/icons/google.png') }}" alt="Google" class="h-6 w-6 object-contain">
                    <span>Login dengan Google</span>
                </a>

                <a href="{{ route('sosial.redirect', 'facebook') }}" class="flex items-center justify-center gap-3 rounded-2xl tombol-outline px-5 py-3 text-center font-black">
                    <img src="{{ asset('assets/icons/facebook.png') }}" alt="Facebook" class="h-6 w-6 object-contain">
                    <span>Login dengan Facebook</span>
                </a>
            </div>

            <p class="mt-5 text-center text-sm text-slate-600">
                Belum punya akun?
                <a href="{{ route('registrasi') }}" class="font-black text-blue-600">Registrasi</a>
            </p>
        </div>
    </div>
@endsection
