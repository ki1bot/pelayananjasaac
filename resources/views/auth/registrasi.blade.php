@extends('layouts.aplikasi', ['judul' => 'Registrasi'])

@section('konten')
    <div class="mx-auto max-w-md">
        <div class="kartu rounded-3xl p-6">
            <h2 class="text-2xl font-bold text-slate-950">Registrasi</h2>

            <form action="{{ route('registrasi.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf

                <div>
                    <label class="text-sm font-semibold">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="input-form mt-2" required>
                </div>

                <div>
                    <label class="text-sm font-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="input-form mt-2" required>
                </div>

                <div>
                    <label class="text-sm font-semibold">Password</label>
                    <div class="relative mt-2">
                        <input id="password" type="password" name="password" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Konfirmasi Password</label>
                    <div class="relative mt-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password_confirmation" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <button class="w-full rounded-xl tombol-primer px-5 py-3 font-semibold">Registrasi</button>
            </form>
        </div>
    </div>
@endsection
