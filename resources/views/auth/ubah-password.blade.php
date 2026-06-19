@extends('layouts.aplikasi')

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
                        <input id="password_lama" type="password" name="password_lama" class="w-full rounded-xl border border-slate-300 px-4 py-3 pr-12" required>
                        <button type="button" onclick="togglePassword('password_lama', 'iconPasswordLama')" class="absolute right-4 top-3">
                            <i id="iconPasswordLama" data-lucide="eye"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Password Baru</label>
                    <div class="relative mt-2">
                        <input id="password" type="password" name="password" class="w-full rounded-xl border border-slate-300 px-4 py-3 pr-12" required>
                        <button type="button" onclick="togglePassword('password', 'iconPasswordBaru')" class="absolute right-4 top-3">
                            <i id="iconPasswordBaru" data-lucide="eye"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Konfirmasi Password Baru</label>
                    <div class="relative mt-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="w-full rounded-xl border border-slate-300 px-4 py-3 pr-12" required>
                        <button type="button" onclick="togglePassword('password_confirmation', 'iconPasswordKonfirmasi')" class="absolute right-4 top-3">
                            <i id="iconPasswordKonfirmasi" data-lucide="eye"></i>
                        </button>
                    </div>
                </div>

                <button class="w-full rounded-xl tombol-primer px-5 py-3 font-semibold">Simpan Password</button>
            </form>
        </div>
    </div>
@endsection
