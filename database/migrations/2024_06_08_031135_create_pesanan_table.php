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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->integer('jumlah_hari');
            $table->string('status_pesanan', 20);
            $table->enum('sopir', ['ya', 'tidak']);
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('kendaraan_id');
            $table->unsignedBigInteger('lepas_kunci_id');
            $table->timestamps();

            $table->foreign('pelanggan_id')->references('id')->on('users');
            $table->foreign('kendaraan_id')->references('kendaraan_id')->on('kendaraan');
            $table->foreign('lepas_kunci_id')->references('lepas_kunci_id')->on('lepas_kunci');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
