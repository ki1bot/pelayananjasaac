<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\LokasiLayanan;
use App\Models\MerkAc;
use App\Models\TarifJarakLayanan;
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
                'wajib_merk' => false,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Service AC',
                'deskripsi' => 'Pengecekan kerusakan dan perbaikan ringan AC.',
                'harga_dasar' => 120000,
                'icon' => 'wrench',
                'wajib_merk' => true,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Isi Freon',
                'deskripsi' => 'Pengisian freon sesuai kebutuhan unit AC.',
                'harga_dasar' => 180000,
                'icon' => 'gauge',
                'wajib_merk' => false,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Bongkar Pasang AC',
                'deskripsi' => 'Bongkar, pindah, dan pasang unit AC.',
                'harga_dasar' => 300000,
                'icon' => 'settings',
                'wajib_merk' => false,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Beli AC',
                'deskripsi' => 'Pembelian unit AC baru dengan rekomendasi kapasitas sesuai kebutuhan ruangan.',
                'harga_dasar' => 2800000,
                'icon' => 'shopping-bag',
                'wajib_merk' => true,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Jual AC',
                'deskripsi' => 'Penjualan AC bekas layak pakai dengan pengecekan kondisi unit terlebih dahulu.',
                'harga_dasar' => 1500000,
                'icon' => 'badge-dollar-sign',
                'wajib_merk' => true,
                'status' => 'aktif',
            ],
        ];

        foreach ($layanan as $item) {
            Layanan::updateOrCreate(['nama' => $item['nama']], $item);
        }

        $lokasi = [
            ['kota' => 'Bekasi', 'jarak_km' => 0, 'status' => 'aktif'],
            ['kota' => 'Jakarta', 'jarak_km' => 20, 'status' => 'aktif'],
            ['kota' => 'Bogor', 'jarak_km' => 55, 'status' => 'aktif'],
            ['kota' => 'Tangerang', 'jarak_km' => 45, 'status' => 'aktif'],
        ];

        foreach ($lokasi as $item) {
            LokasiLayanan::updateOrCreate(['kota' => $item['kota']], $item);
        }

        $merkAc = [
            'Daikin',
            'Panasonic',
            'Sharp',
            'LG',
            'Samsung',
            'Polytron',
            'Gree',
            'Midea',
            'Aqua',
            'Mitsubishi Electric',
            'Mitsubishi Heavy',
            'Toshiba',
            'Fujitsu',
            'Hitachi',
            'York',
            'Carrier',
            'Electrolux',
            'Haier',
            'TCL',
            'Changhong',
            'Hisense',
        ];

        foreach ($merkAc as $nama) {
            MerkAc::updateOrCreate(['nama' => $nama], ['status' => 'aktif']);
        }

        $tarif = [
            'Cuci AC' => [
                'Bekasi' => 0,
                'Jakarta' => 25000,
                'Bogor' => 60000,
                'Tangerang' => 55000,
            ],
            'Service AC' => [
                'Bekasi' => 0,
                'Jakarta' => 35000,
                'Bogor' => 80000,
                'Tangerang' => 70000,
            ],
            'Isi Freon' => [
                'Bekasi' => 0,
                'Jakarta' => 30000,
                'Bogor' => 70000,
                'Tangerang' => 65000,
            ],
            'Bongkar Pasang AC' => [
                'Bekasi' => 0,
                'Jakarta' => 50000,
                'Bogor' => 120000,
                'Tangerang' => 100000,
            ],
            'Beli AC' => [
                'Bekasi' => 0,
                'Jakarta' => 75000,
                'Bogor' => 160000,
                'Tangerang' => 140000,
            ],
            'Jual AC' => [
                'Bekasi' => 0,
                'Jakarta' => 65000,
                'Bogor' => 150000,
                'Tangerang' => 130000,
            ],
        ];

        foreach ($tarif as $namaLayanan => $daftarLokasi) {
            $layananModel = Layanan::where('nama', $namaLayanan)->first();

            foreach ($daftarLokasi as $namaLokasi => $hargaJarak) {
                $lokasiModel = LokasiLayanan::where('kota', $namaLokasi)->first();

                TarifJarakLayanan::updateOrCreate(
                    [
                        'layanan_id' => $layananModel->id,
                        'lokasi_layanan_id' => $lokasiModel->id,
                    ],
                    [
                        'harga_jarak' => $hargaJarak,
                    ]
                );
            }
        }
    }
}
