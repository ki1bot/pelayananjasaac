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
        Schema::create('tarif_jarak_layanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained('layanan')->cascadeOnDelete();
            $table->foreignId('lokasi_layanan_id')->constrained('lokasi_layanan')->cascadeOnDelete();
            $table->unsignedInteger('harga_jarak')->default(0);
            $table->timestamps();

            $table->unique(['layanan_id', 'lokasi_layanan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif_jarak_layanan');
    }
};
