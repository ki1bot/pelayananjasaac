<?php

use App\Http\Controllers\Auth\DaftarController;
use App\Http\Controllers\Auth\MasukController;
use App\Http\Controllers\Auth\ProfilController;
use App\Http\Controllers\Auth\SosialController;
use App\Http\Controllers\Pages\BerandaController;
use App\Http\Controllers\Pages\KeranjangController;
use App\Http\Controllers\Pages\LayananController;
use App\Http\Controllers\Pages\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah', [KeranjangController::class, 'store'])->name('keranjang.store');
Route::delete('/keranjang/{keranjang}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

Route::get('/pembayaran', [PembayaranController::class, 'index'])->middleware('wajibMasuk')->name('pembayaran.index');
Route::post('/pembayaran', [PembayaranController::class, 'store'])->middleware('wajibMasuk')->name('pembayaran.store');

Route::get('/login', [MasukController::class, 'index'])->name('login');
Route::post('/login', [MasukController::class, 'store'])->name('login.store');

Route::get('/registrasi', [DaftarController::class, 'index'])->name('registrasi');
Route::post('/registrasi', [DaftarController::class, 'store'])->name('registrasi.store');

Route::get('/auth/{provider}', [SosialController::class, 'redirect'])->name('sosial.redirect');
Route::get('/auth/{provider}/callback', [SosialController::class, 'callback'])->name('sosial.callback');

Route::get('/profil/ubah-password', [ProfilController::class, 'ubahPassword'])->middleware('wajibMasuk')->name('profil.ubah-password');
Route::put('/profil/ubah-password', [ProfilController::class, 'updatePassword'])->middleware('wajibMasuk')->name('profil.update-password');
Route::post('/logout', [MasukController::class, 'destroy'])->middleware('wajibMasuk')->name('logout');
