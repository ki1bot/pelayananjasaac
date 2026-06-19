<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function ubahPassword()
    {
        return view('auth.ubah-password');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'password_lama' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        if (! Hash::check($data['password_lama'], $request->user()->password)) {
            return back()->with('error', 'Password lama salah.');
        }

        $request->user()->update([
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('beranda')->with('success', 'Password berhasil diubah.');
    }
}
