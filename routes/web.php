<?php

use App\Http\Controllers\Admin\PesananAdminController;
use App\Http\Controllers\Auth\DaftarController;
use App\Http\Controllers\Auth\MasukController;
use App\Http\Controllers\Auth\ProfilController;
use App\Http\Controllers\Auth\SosialController;
use App\Http\Controllers\Pages\BerandaController;
use App\Http\Controllers\Pages\LayananController;
use App\Http\Controllers\Pages\PembayaranController;
use App\Http\Controllers\Pages\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');

Route::get('/login', [MasukController::class, 'index'])->name('login');
Route::post('/login', [MasukController::class, 'store'])->name('login.store');

Route::get('/registrasi', [DaftarController::class, 'index'])->name('registrasi');
Route::post('/registrasi', [DaftarController::class, 'store'])->name('registrasi.store');

Route::get('/auth/{provider}', [SosialController::class, 'redirect'])->name('sosial.redirect');
Route::get('/auth/{provider}/callback', [SosialController::class, 'callback'])->name('sosial.callback');

Route::middleware('wajibMasuk')->group(function () {
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/buat', [PesananController::class, 'create'])->name('pesanan.create');
    Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
    Route::get('/pesanan/{pesanan}', [PesananController::class, 'show'])->name('pesanan.show');
    Route::delete('/pesanan/{pesanan}', [PesananController::class, 'destroy'])->name('pesanan.destroy');

    Route::get('/detail-pesanan/{detailPesanan}/edit', [PesananController::class, 'editDetail'])->name('detail-pesanan.edit');
    Route::put('/detail-pesanan/{detailPesanan}', [PesananController::class, 'updateDetail'])->name('detail-pesanan.update');
    Route::delete('/detail-pesanan/{detailPesanan}', [PesananController::class, 'destroyDetail'])->name('detail-pesanan.destroy');

    Route::get('/pesanan/{pesanan}/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pesanan/{pesanan}/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');

    Route::get('/profil/ubah-password', [ProfilController::class, 'ubahPassword'])->name('profil.ubah-password');
    Route::put('/profil/ubah-password', [ProfilController::class, 'updatePassword'])->name('profil.update-password');

    Route::post('/logout', [MasukController::class, 'destroy'])->name('logout');
});

Route::middleware(['wajibMasuk', 'wajibAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/pesanan', [PesananAdminController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/{pesanan}', [PesananAdminController::class, 'show'])->name('pesanan.show');
    Route::put('/pesanan/{pesanan}/proses', [PesananAdminController::class, 'proses'])->name('pesanan.proses');
    Route::put('/pesanan/{pesanan}/selesai', [PesananAdminController::class, 'selesai'])->name('pesanan.selesai');
});
