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
        Schema::create('keramaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_id');
            $table->string('nama_pemohon');
            $table->string('jabatan')->nullable();
            $table->string('kegiatan');
            $table->string('tempat')->nullable();
            $table->string('waktu_durasi');
            $table->string('date');
            $table->string('permohonan')->nullable();
            $table->string('ktp')->nullable();
            $table->enum('status',['belum_validasi','validasi','ditolak','selesai'])->nullable()->default('belum_validasi');
            $table->string('final')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keramaians');
    }
};
