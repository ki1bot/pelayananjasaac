@extends('layouts.aplikasi', ['judul' => 'Ubah Password'])

@section('konten')
    <div class="mx-auto max-w-md">
        <div class="kartu rounded-3xl p-6">
            <h2 class="text-2xl font-bold text-slate-950">Ubah Password</h2>

            <form action="{{ route('profil.update-password') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="text-sm font-semibold">Password Lama</label>
                    <div class="relative mt-2">
                        <input id="password_lama" type="password" name="password_lama" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password_lama" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Password Baru</label>
                    <div class="relative mt-2">
                        <input id="password" type="password" name="password" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Konfirmasi Password Baru</label>
                    <div class="relative mt-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password_confirmation" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <button class="w-full rounded-xl tombol-primer px-5 py-3 font-semibold">Simpan Password</button>
            </form>
        </div>
    </div>
@endsection
