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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pengguna::class, 'pengguna_id')->nullable()->constrained('pengguna')->nullOnDelete();
            $table->string('session_id')->nullable()->index();
            $table->foreignIdFor(Layanan::class, 'layanan_id')->constrained('layanan')->cascadeOnDelete();
            $table->foreignIdFor(LokasiLayanan::class, 'lokasi_layanan_id')->constrained('lokasi_layanan')->cascadeOnDelete();
            $table->unsignedInteger('jumlah')->default(1);
            $table->unsignedInteger('harga_layanan');
            $table->unsignedInteger('biaya_jarak');
            $table->unsignedInteger('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
