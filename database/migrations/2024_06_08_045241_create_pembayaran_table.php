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
            $table->id('pembayaran_id');
            $table->string('metode', 20);
            $table->integer('jumlah_sudah_dibayar')->nullable();
            $table->dateTime('waktu_pembayaran')->nullable();
            $table->dateTime('batas_waktu_pembayaran');
            $table->string('status_pembayaran', 20);
            $table->unsignedBigInteger('pesanan_id');
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('karyawan_id')->nullable();
            $table->timestamps();

            $table->foreign('pesanan_id')->references('pesanan_id')->on('pesanan');
            $table->foreign('pelanggan_id')->references('id')->on('users');
            $table->foreign('karyawan_id')->references('id')->on('users');
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
