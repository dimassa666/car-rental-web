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
            $table->id('detail_pesanan_id'); 
            $table->integer('subtotal_kendaraan'); 
            $table->integer('subtotal_antar_jemput'); 
            $table->integer('subtotal_sopir'); 
            $table->integer('potongan_voucher'); 
            $table->integer('total_pembayaran'); 
            $table->unsignedBigInteger('pesanan_id'); 
            $table->timestamps();
            
            $table->foreign('pesanan_id')->references('pesanan_id')->on('pesanan')->onDelete('cascade');
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
