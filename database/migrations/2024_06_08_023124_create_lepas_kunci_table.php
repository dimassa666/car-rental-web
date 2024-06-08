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
        Schema::create('lepas_kunci', function (Blueprint $table) {
            $table->id('lepas_kunci_id');
            $table->string('tipe_antar', 10);
            $table->string('tipe_jemput', 10);
            $table->string('lokasi_antar', 255);
            $table->string('lokasi_jemput', 255);
            $table->integer('biaya_antar_jemput');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lepas_kunci');
    }
};
