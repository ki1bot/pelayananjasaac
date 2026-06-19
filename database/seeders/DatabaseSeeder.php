<?php

namespace Database\Seeders;

use App\Models\GrafikBeranda;
use App\Models\Layanan;
use App\Models\LokasiLayanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $layanan = [
            ['nama' => 'Cuci AC', 'deskripsi' => 'Pembersihan AC indoor dan outdoor agar dingin kembali.', 'harga_dasar' => 75000, 'icon' => 'wind'],
            ['nama' => 'Service AC', 'deskripsi' => 'Pengecekan kerusakan dan perbaikan ringan AC.', 'harga_dasar' => 120000, 'icon' => 'wrench'],
            ['nama' => 'Isi Freon', 'deskripsi' => 'Pengisian freon sesuai kebutuhan unit AC.', 'harga_dasar' => 180000, 'icon' => 'gauge'],
            ['nama' => 'Bongkar Pasang AC', 'deskripsi' => 'Bongkar, pindah, dan pasang unit AC.', 'harga_dasar' => 300000, 'icon' => 'settings'],
        ];

        foreach ($layanan as $item) {
            Layanan::updateOrCreate(['nama' => $item['nama']], $item);
        }

        $lokasi = [
            ['kota' => 'Bekasi', 'jarak_km' => 0],
            ['kota' => 'Jakarta', 'jarak_km' => 20],
            ['kota' => 'Bogor', 'jarak_km' => 55],
            ['kota' => 'Tangerang', 'jarak_km' => 45],
        ];

        foreach ($lokasi as $item) {
            LokasiLayanan::updateOrCreate(['kota' => $item['kota']], $item);
        }

        $grafik = [
            ['nama_produk' => 'Cuci AC', 'jumlah_pesanan' => 80],
            ['nama_produk' => 'Service AC', 'jumlah_pesanan' => 54],
            ['nama_produk' => 'Isi Freon', 'jumlah_pesanan' => 36],
            ['nama_produk' => 'Bongkar Pasang AC', 'jumlah_pesanan' => 18],
        ];

        foreach ($grafik as $item) {
            GrafikBeranda::updateOrCreate(['nama_produk' => $item['nama_produk']], $item);
        }
    }
}
