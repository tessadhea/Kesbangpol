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
        Schema::create('surat2s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penelitian_id');
            $table->string('no1');
            $table->string('no2')->nullable();
            $table->string('no3')->nullable();
            $table->string('no4')->nullable();
            $table->string('no5')->nullable();
            $table->string('sd');
            $table->string('no');
            $table->date('tanggal');
            $table->string('hal');
            $table->string('judul');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat2s');
    }
};
