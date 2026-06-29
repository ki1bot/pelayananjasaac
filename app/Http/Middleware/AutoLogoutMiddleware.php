<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutoLogoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return $next($request);
        }

        $batasMenit = max((int) config('session.auto_logout_after', 15), 1);
        $batasDetik = $batasMenit * 60;
        $waktuSekarang = now()->timestamp;
        $terakhirAktif = $request->session()->get('terakhir_aktif_pada');

        if ($terakhirAktif !== null && ($waktuSekarang - (int) $terakhirAktif) > $batasDetik) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Sesi login berakhir karena tidak ada aktivitas.',
                ], 401);
            }

            return redirect()->route('login')->with('error', 'Sesi login berakhir karena tidak ada aktivitas.');
        }

        $request->session()->put('terakhir_aktif_pada', $waktuSekarang);

        return $next($request);
    }
}
