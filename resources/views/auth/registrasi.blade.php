@extends('layouts.aplikasi')

@section('konten')
    <div class="mx-auto max-w-md">
        <div class="kartu rounded-3xl p-6">
            <h2 class="text-2xl font-bold text-slate-950">Registrasi</h2>

            <form action="{{ route('registrasi.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf

                <div>
                    <label class="text-sm font-semibold">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" required>
                </div>

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

                <div>
                    <label class="text-sm font-semibold">Konfirmasi Password</label>
                    <div class="relative mt-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="w-full rounded-xl border border-slate-300 px-4 py-3 pr-12" required>
                        <button type="button" onclick="togglePassword('password_confirmation', 'iconPasswordKonfirmasi')" class="absolute right-4 top-3">
                            <i id="iconPasswordKonfirmasi" data-lucide="eye"></i>
                        </button>
                    </div>
                </div>

                <button class="w-full rounded-xl tombol-primer px-5 py-3 font-semibold">Registrasi</button>
            </form>
        </div>
    </div>
@endsection
