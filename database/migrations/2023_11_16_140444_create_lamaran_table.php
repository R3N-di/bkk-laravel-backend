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
        Schema::create('lamaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_lowongan');
            $table->foreign('id_lowongan')->references('id')->on('lowongan');
            $table->uuid('id_alumni');
            $table->foreign('id_alumni')->references('id')->on('alumni');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};
