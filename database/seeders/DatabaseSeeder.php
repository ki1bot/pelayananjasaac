<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\LokasiLayanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $layanan = [
            [
                'nama' => 'Cuci AC',
                'deskripsi' => 'Pembersihan AC indoor dan outdoor agar dingin kembali.',
                'harga_dasar' => 75000,
                'icon' => 'wind',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Service AC',
                'deskripsi' => 'Pengecekan kerusakan dan perbaikan ringan AC.',
                'harga_dasar' => 120000,
                'icon' => 'wrench',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Isi Freon',
                'deskripsi' => 'Pengisian freon sesuai kebutuhan unit AC.',
                'harga_dasar' => 180000,
                'icon' => 'gauge',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Bongkar Pasang AC',
                'deskripsi' => 'Bongkar, pindah, dan pasang unit AC.',
                'harga_dasar' => 300000,
                'icon' => 'settings',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Beli AC',
                'deskripsi' => 'Pembelian unit AC baru dengan rekomendasi kapasitas sesuai kebutuhan ruangan.',
                'harga_dasar' => 2800000,
                'icon' => 'shopping-bag',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Jual AC',
                'deskripsi' => 'Penjualan AC bekas layak pakai dengan pengecekan kondisi unit terlebih dahulu.',
                'harga_dasar' => 1500000,
                'icon' => 'badge-dollar-sign',
                'status' => 'aktif',
            ],
        ];

        foreach ($layanan as $item) {
            Layanan::updateOrCreate(
                ['nama' => $item['nama']],
                $item
            );
        }

        $lokasi = [
            [
                'kota' => 'Bekasi',
                'jarak_km' => 0,
                'status' => 'aktif',
            ],
            [
                'kota' => 'Jakarta',
                'jarak_km' => 20,
                'status' => 'aktif',
            ],
            [
                'kota' => 'Bogor',
                'jarak_km' => 55,
                'status' => 'aktif',
            ],
            [
                'kota' => 'Tangerang',
                'jarak_km' => 45,
                'status' => 'aktif',
            ],
        ];

        foreach ($lokasi as $item) {
            LokasiLayanan::updateOrCreate(
                ['kota' => $item['kota']],
                $item
            );
        }
    }
}
