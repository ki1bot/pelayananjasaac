<?php

namespace App\Console\Commands;

use App\Models\Pengguna;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class BuatAdmin extends Command
{
    protected $signature = 'admin:buat';

    protected $description = 'Membuat atau memperbarui akun admin';

    public function handle(): int
    {
        $nama = $this->ask('Nama admin', 'Rifqi Admin');
        $email = $this->ask('Email admin');
        $password = $this->secret('Password admin');

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Format email tidak valid.');
            return self::FAILURE;
        }

        if (strlen($password) < 8) {
            $this->error('Password minimal 8 karakter.');
            return self::FAILURE;
        }

        Pengguna::updateOrCreate(
            [
                'email' => $email,
            ],
            [
                'nama' => $nama,
                'password' => Hash::make($password),
                'role' => 'admin',
                'provider' => null,
                'provider_id' => null,
                'avatar' => null,
            ]
        );

        $this->info('Akun admin berhasil disimpan.');
        $this->line('Email: '.$email);

        return self::SUCCESS;
    }
}
