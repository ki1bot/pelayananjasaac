# Project Website Pelayanan Jasa AC

Project Website Pelayanan Jasa AC adalah aplikasi web berbasis Laravel untuk mengelola layanan jasa AC, mulai dari daftar layanan, pemesanan pelanggan, detail pesanan, pembayaran, autentikasi pelanggan, sampai panel admin untuk memproses status pesanan.

Website ini dibuat sebagai sistem pemesanan layanan AC yang dapat digunakan pelanggan untuk memilih layanan, membuat pesanan, mengisi detail kebutuhan servis, melakukan pembayaran, dan memantau status pesanan. Admin dapat mengelola serta memproses pesanan pelanggan dari tahap proses sampai selesai.

## Live Demo

https://pelayananjasaac.rf.gd/

## Repository

https://github.com/ki1bot/pelayananjasaac.git

## Fitur Utama

- Halaman beranda dan daftar layanan jasa AC
- Registrasi dan login pelanggan
- Autentikasi pengguna untuk pelanggan dan admin
- Pembuatan pesanan layanan oleh pelanggan
- Pengelolaan detail pesanan seperti layanan, merk AC, lokasi, dan tarif jarak
- Fitur pembayaran untuk pesanan pelanggan
- Panel admin untuk melihat dan memproses pesanan
- Manajemen status pesanan dari proses sampai selesai
- Penyimpanan data layanan, pelanggan, pesanan, detail pesanan, dan pembayaran menggunakan database MySQL

## Teknologi yang Digunakan

- Laravel
- PHP
- Blade
- Tailwind CSS
- Vite
- MySQL
- Composer
- NPM

## Persyaratan Sistem

- PHP 8.3 atau lebih baru
- Composer
- Node.js dan NPM
- MySQL atau MariaDB
- Web server Apache atau Nginx

## Instalasi Project

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

Salin file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Atur konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

Jalankan migrasi database:

```bash
php artisan migrate
```

Jalankan seeder jika tersedia:

```bash
php artisan db:seed
```

Build asset frontend:

```bash
npm run build
```

Jalankan project di lokal:

```bash
php artisan serve
```

Akses project melalui browser:

```text
http://127.0.0.1:8000
```

## Deployment

Untuk deployment ke hosting shared seperti InfinityFree, pastikan file `.env` sudah disesuaikan dengan konfigurasi hosting.

Contoh konfigurasi penting:

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
```

Jika project Laravel diupload langsung ke folder `htdocs`, arahkan request ke folder `public` menggunakan file `.htaccess` di root `htdocs`.

```apache
Options -Indexes

<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(?!public/)(.*)$ public/$1 [L]
</IfModule>
```

Pastikan folder berikut ikut terupload ke hosting:

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
```

Pastikan juga hasil build Vite tersedia pada:

```text
public/build
```

## Alur Sistem

Pelanggan dapat membuat akun, login, memilih layanan jasa AC, membuat pesanan, mengisi detail pesanan, melakukan pembayaran, dan melihat status pesanan.

Admin dapat login ke panel admin, melihat data pesanan pelanggan, memproses pesanan, dan mengubah status pesanan sampai selesai.

## Author

Rifqi
GitHub: https://github.com/ki1bot
