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
        Schema::create('syarat_kualifikasi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_lowongan');
            $table->foreign('id_lowongan')->references('id')->on('lowongan');
            $table->string('field_kualifikasi', 255);
            $table->text('isi_kualifikasi');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syarat_kualifikasi');
    }
};
