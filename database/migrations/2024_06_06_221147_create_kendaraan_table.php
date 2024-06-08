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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id('kendaraan_id');
            $table->string('kategori', 10);
            $table->string('jenis', 20);
            $table->string('merk', 50);
            $table->string('tipe', 50);
            $table->string('transmisi', 10);
            $table->string('tahun_produksi', 5);
            $table->integer('harga_sewa');
            $table->string('plat_nomor', 10);
            $table->string('status', 20);
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
