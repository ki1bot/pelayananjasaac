<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($data)) {
            return back()->with('error', 'Email atau password salah.')->onlyInput('email');
        }

        $request->session()->regenerate();
        $request->session()->put('terakhir_aktif_pada', now()->timestamp);

        Keranjang::where('session_id', $request->session()->getId())
            ->update(['pengguna_id' => Auth::id()]);

        return redirect()->route('beranda')->with('success', 'Login berhasil.');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('beranda')->with('success', 'Logout berhasil.');
    }
}
