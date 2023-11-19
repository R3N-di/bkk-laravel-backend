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
        Schema::create('inputan_kualifikasi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_lamaran');
            $table->foreign('id_lamaran')->referances('id')->on('lamaran');
            $table->uuid('id_syarat_kualifikasi');
            $table->foreign('id_syarat_kualifikasi')->references('id')->on('syarat_kualifikasi');
            $table->text('isi_inputan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputan_kualifikasi');
    }
};
