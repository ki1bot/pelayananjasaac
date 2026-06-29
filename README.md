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

## Struktur Project

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   │   └── PesananAdminController.php
│   │   ├── Auth/
│   │   │   ├── DaftarController.php
│   │   │   ├── MasukController.php
│   │   │   ├── ProfilController.php
│   │   │   └── SosialController.php
│   │   └── Pages/
│   │       ├── BerandaController.php
│   │       ├── LayananController.php
│   │       ├── PembayaranController.php
│   │       └── PesananController.php
│   └── Middleware/
├── Models/
│   ├── DetailPesanan.php
│   ├── Layanan.php
│   ├── LokasiLayanan.php
│   ├── MerkAc.php
│   ├── Pembayaran.php
│   ├── Pengguna.php
│   ├── Pesanan.php
│   └── TarifJarakLayanan.php

database/
├── migrations/
└── seeders/
    └── DatabaseSeeder.php

resources/
├── css/
│   └── app.css
├── js/
│   └── app.js
└── views/

routes/
└── web.php
```

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

Buat file `.env`:

```bash
cp .env.example .env
```

Jika file `.env.example` tidak tersedia di repository lokal, buat file `.env` secara manual di root project, lalu isi konfigurasi dasar seperti berikut:

```env
APP_NAME="Pelayanan Jasa AC"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pelayananjasaac
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120

CACHE_STORE=database
QUEUE_CONNECTION=database

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback

FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
FACEBOOK_REDIRECT_URI=http://127.0.0.1:8000/auth/facebook/callback
```

Generate application key:

```bash
php artisan key:generate
```

Buat database MySQL:

```sql
CREATE DATABASE pelayananjasaac;
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

## Menjalankan Project dengan Composer Script

Project ini juga menyediakan script development dari Composer.

```bash
composer run dev
```

Script tersebut menjalankan Laravel server, queue listener, Laravel Pail, dan Vite secara bersamaan menggunakan `concurrently`.

## Build Asset Frontend

Untuk membuat asset production:

```bash
npm run build
```

Hasil build Vite akan dibuat di:

```text
public/build
```

Folder tersebut harus ikut tersedia ketika project dideploy ke hosting production.

## Konfigurasi Login Google dan Facebook

Project ini menggunakan Laravel Socialite untuk login Google dan Facebook.

Tambahkan konfigurasi berikut pada file `.env`:

```env
GOOGLE_CLIENT_ID=client_id_google
GOOGLE_CLIENT_SECRET=client_secret_google
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback

FACEBOOK_CLIENT_ID=client_id_facebook
FACEBOOK_CLIENT_SECRET=client_secret_facebook
FACEBOOK_REDIRECT_URI=http://127.0.0.1:8000/auth/facebook/callback
```

Untuk production, ubah redirect URI menjadi domain production:

```env
GOOGLE_REDIRECT_URI=https://pelayananjasaac.rf.gd/auth/google/callback
FACEBOOK_REDIRECT_URI=https://pelayananjasaac.rf.gd/auth/facebook/callback
```

## Deployment ke Shared Hosting

Untuk deployment ke shared hosting seperti InfinityFree, pastikan environment production sudah disesuaikan.

Contoh konfigurasi penting pada `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://pelayananjasaac.rf.gd

DB_CONNECTION=mysql
DB_HOST=host_database
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database

GOOGLE_REDIRECT_URI=https://pelayananjasaac.rf.gd/auth/google/callback
FACEBOOK_REDIRECT_URI=https://pelayananjasaac.rf.gd/auth/facebook/callback
```

Sebelum upload ke hosting, jalankan perintah berikut di lokal:

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

Pastikan folder dan file berikut ikut terupload:

```text
app
bootstrap
config
database
public
resources
routes
storage
vendor
.env
artisan
composer.json
composer.lock
package.json
package-lock.json
vite.config.js
```

Pastikan juga hasil build Vite tersedia pada:

```text
public/build
```

Jika project Laravel diupload langsung ke folder `htdocs`, arahkan request ke folder `public` menggunakan file `.htaccess` di root `htdocs`:

```apache
Options -Indexes

<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(?!public/)(.*)$ public/$1 [L]
</IfModule>
```

Konfigurasi yang lebih aman adalah meletakkan seluruh folder Laravel di luar `htdocs`, lalu hanya isi folder `public` yang diarahkan sebagai document root. Namun pada shared hosting gratis, akses document root biasanya terbatas, sehingga konfigurasi `.htaccess` sering diperlukan.

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

## Catatan Penting

- File `.env` tidak boleh dipush ke repository karena berisi konfigurasi sensitif.
- Pastikan database sudah dibuat sebelum menjalankan migrasi.
- Jalankan `npm run build` sebelum deploy agar asset Tailwind CSS dan JavaScript tersedia di `public/build`.
- Jika tampilan Tailwind CSS tidak muncul di hosting, periksa kembali folder `public/build` dan path asset Vite di halaman Blade.
- Login Google dan Facebook hanya berjalan jika client ID, client secret, dan redirect URI sudah sesuai dengan domain yang digunakan.
- Admin hanya bisa mengelola pesanan yang statusnya bukan `draft`.

## Author

Rifqi

GitHub: https://github.com/ki1bot
