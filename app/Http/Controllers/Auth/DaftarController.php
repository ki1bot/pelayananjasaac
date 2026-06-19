<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    public function index()
    {
        return view('auth.registrasi');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160', 'unique:pengguna,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $pengguna = Pengguna::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'pelanggan',
            'provider' => null,
            'provider_id' => null,
            'avatar' => null,
        ]);

        Auth::login($pengguna);

        return redirect()->route('beranda')->with('success', 'Akun pelanggan berhasil dibuat.');
    }
}
