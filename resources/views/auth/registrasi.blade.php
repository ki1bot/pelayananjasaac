@extends('layouts.aplikasi', ['judul' => 'Registrasi'])

@section('konten')
    <div class="mx-auto max-w-md">
        <div class="kartu rounded-[2.2rem] p-6 sm:p-8">
            <div class="text-center">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-50 text-blue-600">
                    <i data-lucide="user-plus"></i>
                </div>
                <h2 class="mt-4 text-3xl font-black text-slate-950">Registrasi</h2>
                <p class="mt-2 text-sm text-slate-500">Buat akun untuk transaksi layanan AC.</p>
            </div>

            <form action="{{ route('registrasi.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf

                <div>
                    <label class="text-sm font-black text-slate-800">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="input-form mt-2" required>
                </div>

                <div>
                    <label class="text-sm font-black text-slate-800">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="input-form mt-2" required>
                </div>

                <div>
                    <label class="text-sm font-black text-slate-800">Password</label>
                    <div class="relative mt-2">
                        <input id="password" type="password" name="password" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-black text-slate-800">Konfirmasi Password</label>
                    <div class="relative mt-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password_confirmation" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <button class="w-full rounded-2xl tombol-primer px-5 py-3 font-black">Registrasi</button>
            </form>

            <p class="mt-5 text-center text-sm text-slate-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-black text-blue-600">Login</a>
            </p>
        </div>
    </div>
@endsection
