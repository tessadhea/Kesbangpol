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
        Schema::create('ormas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_id');
            $table->string('nama_ormas')->unique();
            $table->string('nama_ketua')->nullable();
            $table->string('nama_sek')->nullable();
            $table->string('nama_bend')->nullable();
            $table->string('bid')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->bigInteger('no_hp')->nullable();
            $table->bigInteger('no_hp2')->nullable();
            $table->bigInteger('no_hp3')->nullable();
            $table->string('scan_surat_permohonan')->nullable();
            $table->string('scan_sk_mendagri')->nullable();
            $table->string('ad_art')->nullable();
            $table->string('proker')->nullable();
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('sk_domisili')->nullable();
            $table->string('foto_kantor')->nullable();
            $table->string('sk_pernyataan')->nullable();
            $table->string('Form_ormas')->nullable();
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
        Schema::dropIfExists('ormas');
    }
};
