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
            'nama' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:pengguna,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $pengguna = Pengguna::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($pengguna);

        return redirect()->route('beranda')->with('success', 'Registrasi berhasil.');
    }
}
