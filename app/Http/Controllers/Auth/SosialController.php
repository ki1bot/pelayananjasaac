<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SosialController extends Controller
{
    public function redirect(string $provider)
    {
        abort_unless(in_array($provider, ['google', 'facebook']), 404);

        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        abort_unless(in_array($provider, ['google', 'facebook']), 404);

        $akun = Socialite::driver($provider)->stateless()->user();

        $pengguna = Pengguna::updateOrCreate(
            ['email' => $akun->getEmail()],
            [
                'nama' => $akun->getName() ?: $akun->getNickname() ?: 'Pengguna',
                'provider' => $provider,
                'provider_id' => $akun->getId(),
                'avatar' => $akun->getAvatar(),
                'password' => bcrypt(Str::random(32)),
            ]
        );

        Auth::login($pengguna);

        return redirect()->route('beranda')->with('success', 'Login berhasil.');
    }
}
