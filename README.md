# Project Website Pelayanan Jasa AC

Project Website Pelayanan Jasa AC adalah aplikasi web berbasis Laravel untuk mengelola layanan jasa AC, pemesanan pelanggan, detail pesanan, pembayaran, autentikasi pengguna, serta panel admin untuk memproses pesanan.

Aplikasi ini dibuat untuk membantu proses pemesanan layanan AC secara lebih terstruktur. Pelanggan dapat melihat daftar layanan, membuat pesanan, memilih lokasi layanan, memilih merk AC jika diperlukan, melakukan pembayaran, dan memantau status pesanan. Admin dapat melihat pesanan yang masuk, mengecek detail pesanan dan pembayaran, lalu mengubah status pesanan sampai selesai.

## Live Demo

https://pelayananjasaac.rf.gd/

## Repository

https://github.com/ki1bot/pelayananjasaac.git

## Fitur Utama

### Fitur Pelanggan

- Registrasi dan login pelanggan.
- Login menggunakan akun Google dan Facebook melalui Laravel Socialite.
- Melihat halaman beranda dengan daftar layanan aktif.
- Melihat daftar layanan jasa AC beserta harga dasar dan tarif jarak.
- Membuat pesanan layanan AC.
- Menambahkan detail pesanan berdasarkan layanan, merk AC, lokasi layanan, jumlah, dan catatan.
- Mengubah detail pesanan selama status pesanan masih draft.
- Menghapus detail pesanan selama status pesanan masih draft.
- Menghapus pesanan draft.
- Melakukan pembayaran dengan beberapa metode pembayaran.
- Melihat detail pesanan, rincian biaya, pembayaran, dan status pesanan.
- Mengubah password akun.

### Fitur Admin

- Melihat daftar pesanan pelanggan yang sudah masuk ke proses pembayaran.
- Melihat detail pelanggan, detail layanan, tarif jarak, merk AC, total biaya, dan data pembayaran.
- Mengubah status pesanan dari `sedang_ditinjau` menjadi `diproses`.
- Mengubah status pesanan dari `diproses` menjadi `selesai`.
- Membatasi akses panel admin menggunakan middleware admin.

### Fitur Sistem

- Perhitungan otomatis subtotal berdasarkan rumus `(harga layanan + harga jarak) x jumlah`.
- Perhitungan ulang total pesanan setiap detail pesanan ditambahkan, diubah, atau dihapus.
- Kode pesanan otomatis dengan format `ORD-XXXXXXXXXX`.
- Kode pembayaran otomatis dengan format `PAY-XXXXXXXXXX`.
- Status pesanan: `draft`, `sedang_ditinjau`, `diproses`, `selesai`, dan `dibatalkan`.
- Status pembayaran awal: `menunggu_konfirmasi`.
- Validasi layanan, tarif jarak, merk AC, jumlah, catatan, dan metode pembayaran.
- Proteksi akses agar pelanggan hanya dapat membuka pesanan miliknya sendiri.

## Layanan yang Tersedia

Data awal layanan berasal dari database seeder.

| Layanan | Harga Dasar | Keterangan |
| --- | ---: | --- |
| Cuci AC | Rp75.000 | Pembersihan AC indoor dan outdoor agar dingin kembali. |
| Service AC | Rp120.000 | Pengecekan kerusakan dan perbaikan ringan AC. |
| Isi Freon | Rp180.000 | Pengisian freon sesuai kebutuhan unit AC. |
| Bongkar Pasang AC | Rp300.000 | Bongkar, pindah, dan pasang unit AC. |
| Beli AC | Rp2.800.000 | Pembelian unit AC baru dengan rekomendasi kapasitas ruangan. |
| Jual AC | Rp1.500.000 | Penjualan AC bekas layak pakai dengan pengecekan kondisi unit. |

## Lokasi Layanan

Data awal lokasi layanan berasal dari database seeder.

| Lokasi | Jarak |
| --- | ---: |
| Bekasi | 0 km |
| Jakarta | 20 km |
| Bogor | 55 km |
| Tangerang | 45 km |
| Banten | 90 km |
| Cikarang | 25 km |

Setiap layanan memiliki tarif jarak berbeda berdasarkan lokasi tujuan. Total biaya dihitung dari harga dasar layanan, tarif jarak, dan jumlah layanan yang dipilih pelanggan.

## Metode Pembayaran

Metode pembayaran yang tersedia di halaman pembayaran:

- QRIS
- Transfer Bank
- GoPay
- DANA
- ShopeePay
- OVO
- LinkAja

## Teknologi yang Digunakan

### Backend

- PHP 8.3
- Laravel 12
- Laravel Socialite
- Laravel Tinker
- MySQL atau MariaDB

### Frontend

- Blade Template Engine
- Tailwind CSS 4
- Vite 8
- Chart.js
- Lucide Icons
- Instrument Sans melalui `laravel-vite-plugin/fonts`

### Tools

- Composer
- NPM
- Laravel Pint
- PHPUnit
- Laravel Pail
- Concurrently

## Alur Sistem

1. Pelanggan membuka halaman beranda atau halaman layanan.
2. Pelanggan melakukan registrasi atau login.
3. Pelanggan membuat pesanan dan menambahkan detail layanan.
4. Sistem menghitung subtotal dan total pesanan secara otomatis.
5. Pelanggan masuk ke halaman pembayaran dan memilih metode pembayaran.
6. Sistem membuat data pembayaran dan mengubah status pesanan menjadi `sedang_ditinjau`.
7. Admin membuka panel admin untuk melihat pesanan yang masuk.
8. Admin memproses pesanan sehingga status berubah menjadi `diproses`.
9. Admin menyelesaikan pesanan sehingga status berubah menjadi `selesai`.
10. Pelanggan dapat melihat status akhir pesanan melalui halaman detail pesanan.

## Routing Utama

| Method | URL | Keterangan |
| --- | --- | --- |
| GET | `/` | Halaman beranda |
| GET | `/layanan` | Halaman daftar layanan |
| GET | `/login` | Halaman login |
| POST | `/login` | Proses login |
| GET | `/registrasi` | Halaman registrasi |
| POST | `/registrasi` | Proses registrasi |
| GET | `/auth/{provider}` | Redirect login Google atau Facebook |
| GET | `/auth/{provider}/callback` | Callback login Google atau Facebook |
| GET | `/pesanan` | Daftar pesanan pelanggan |
| GET | `/pesanan/buat` | Form buat pesanan |
| POST | `/pesanan` | Simpan detail pesanan |
| GET | `/pesanan/{pesanan}` | Detail pesanan |
| DELETE | `/pesanan/{pesanan}` | Hapus pesanan draft |
| GET | `/pesanan/{pesanan}/pembayaran` | Halaman pembayaran |
| POST | `/pesanan/{pesanan}/pembayaran` | Simpan pembayaran |
| GET | `/admin/pesanan` | Daftar pesanan admin |
| GET | `/admin/pesanan/{pesanan}` | Detail pesanan admin |
| PUT | `/admin/pesanan/{pesanan}/proses` | Ubah status menjadi diproses |
| PUT | `/admin/pesanan/{pesanan}/selesai` | Ubah status menjadi selesai |

## Persyaratan Sistem

- PHP 8.3 atau lebih baru.
- Composer.
- Node.js dan NPM.
- MySQL atau MariaDB.
- Web server Apache, Nginx, atau Laravel development server.

## Instalasi Project di Lokal

Clone repository:

```bash
git clone https://github.com/ki1bot/pelayananjasaac.git
cd pelayananjasaac
```

Install dependency PHP:

```bash
composer install
```

Install dependency frontend:

```bash
npm install
```

Jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

Jalankan development server Laravel:

```bash
php artisan serve
```

Jalankan Vite di terminal lain:

```bash
npm run dev
```

Akses project di browser:

```text
http://127.0.0.1:8000
```

## Perintah Artisan yang Sering Digunakan

```bash
php artisan migrate
php artisan migrate:fresh --seed
php artisan db:seed
php artisan optimize:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
```

## Testing

Jalankan test Laravel:

```bash
php artisan test
```

Atau melalui Composer:

```bash
composer run test
```

## Author

Rifqi

GitHub: https://github.com/ki1bot
