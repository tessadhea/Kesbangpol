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
        Schema::create('ibadahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_id');
            $table->string('nama_RmIbadah')->unique();
            $table->string('nama_ketua')->nullable();
            $table->string('nama_sekertaris')->nullable();
            $table->string('nama_bendahara')->nullable();
            $table->string('alamat')->nullable();
            $table->bigInteger('no_hp')->nullable();
            $table->string('SKTM')->nullable();
            $table->string('sk_kementrian')->nullable();
            $table->string('sk_SpengurusPusat')->nullable();
            $table->string('sk_Spengurus')->nullable();
            $table->string('bio_pengurus')->nullable();
            $table->string('pasfoto_pengurus')->nullable();
            $table->string('ktp_pengurus')->nullable();
            $table->string('sk_domisili')->nullable();
            $table->string('foto_ibadah')->nullable();
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
        Schema::dropIfExists('ibadahs');
    }
};
