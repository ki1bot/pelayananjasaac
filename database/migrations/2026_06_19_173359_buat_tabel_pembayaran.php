<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pengguna::class, 'pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->string('kode_pembayaran')->unique();
            $table->string('metode', 60);
            $table->unsignedInteger('total');
            $table->enum('status', ['menunggu', 'berhasil', 'gagal'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
