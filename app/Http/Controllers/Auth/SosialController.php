<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;

class SosialController extends Controller
{
    private function socialite(string $provider): AbstractProvider
    {
        $driver = Socialite::driver($provider);
        $cacert = storage_path('app/certificates/cacert.pem');

        if (file_exists($cacert)) {
            $driver->setHttpClient(new Client([
                'verify' => $cacert,
            ]));
        }

        return $driver;
    }

    public function redirect(string $provider)
    {
        abort_unless(in_array($provider, ['google', 'facebook']), 404);

        return $this->socialite($provider)->redirect();
    }

    public function callback(Request $request, string $provider)
    {
        abort_unless(in_array($provider, ['google', 'facebook']), 404);

        $akun = $this->socialite($provider)->stateless()->user();

        if (! $akun->getEmail()) {
            return redirect()
                ->route('login')
                ->with('error', 'Login gagal karena akun tidak memberikan alamat email.');
        }

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

        $request->session()->regenerate();
        $request->session()->put('terakhir_aktif_pada', now()->timestamp);

        return redirect()->route('beranda')->with('success', 'Login berhasil.');
    }
}
