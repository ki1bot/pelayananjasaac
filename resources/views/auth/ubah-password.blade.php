@extends('layouts.aplikasi', ['judul' => 'Ubah Password'])

@section('konten')
    <div class="mx-auto max-w-md">
        <div class="kartu rounded-[2.2rem] p-6 sm:p-8">
            <div class="text-center">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-50 text-blue-600">
                    <i data-lucide="key-round"></i>
                </div>
                <h2 class="mt-4 text-3xl font-black text-slate-950">Ubah Password</h2>
                <p class="mt-2 text-sm text-slate-500">Gunakan password baru yang kuat dan mudah kamu ingat.</p>
            </div>

            <form action="{{ route('profil.update-password') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="label-form">Password Lama</label>
                    <div class="relative mt-2">
                        <input id="password_lama" type="password" name="password_lama" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password_lama" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="label-form">Password Baru</label>
                    <div class="relative mt-2">
                        <input id="password" type="password" name="password" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="label-form">Konfirmasi Password Baru</label>
                    <div class="relative mt-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="input-form pr-12" required>

                        <button type="button" data-password-toggle data-password-target="password_confirmation" class="absolute right-4 top-3 text-slate-500">
                            <i data-lucide="eye" data-password-eye-open></i>
                            <i data-lucide="eye-off" data-password-eye-close class="hidden"></i>
                        </button>
                    </div>
                </div>

                <button class="w-full rounded-2xl tombol-primer px-5 py-3 font-black">Simpan Password</button>
            </form>
        </div>
    </div>
@endsection
