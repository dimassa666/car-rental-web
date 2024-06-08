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
        Schema::create('voucher', function (Blueprint $table) {
            $table->id('voucher_id'); 
            $table->string('kode_voucher', 100); 
            $table->integer('nilai_diskon'); 
            $table->dateTime('batas_waktu');  
            $table->enum('status', ['aktif', 'kedaluwarsa']); 
            $table->unsignedBigInteger('karyawan_id');  

            $table->foreign('karyawan_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher');
    }
};
