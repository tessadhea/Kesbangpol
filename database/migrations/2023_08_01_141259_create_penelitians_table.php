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
        Schema::create('penelitians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_id');
            $table->string('nama_pemohon');
            $table->string('nim');
            $table->string('lokasi')->nullable();
            $table->string('waktu');
            $table->string('penanggung_jawab')->nullable();
            $table->string('instansi');
            $table->string('pengantar')->nullable();
            $table->string('ktp')->nullable();
            $table->enum('status',['belum_validasi','validasi','ditolak','selesai'])->nullable()->default('belum_validasi');
            $table->timestamps();
            $table->string('final')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penelitians');
    }
};
