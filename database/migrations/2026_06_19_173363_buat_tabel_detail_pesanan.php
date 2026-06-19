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
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanan')->cascadeOnDelete();
            $table->foreignId('layanan_id')->constrained('layanan')->restrictOnDelete();
            $table->foreignId('merk_ac_id')->nullable()->constrained('merk_ac')->nullOnDelete();
            $table->foreignId('tarif_jarak_layanan_id')->constrained('tarif_jarak_layanan')->restrictOnDelete();
            $table->unsignedInteger('jumlah')->default(1);
            $table->unsignedInteger('harga_layanan');
            $table->unsignedInteger('harga_jarak');
            $table->unsignedInteger('subtotal');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan');
    }
};
