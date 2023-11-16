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
        Schema::create('chat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_lowongan');
            $table->foreign('id_lowongan')->references('id')->on('lowongan');
            $table->uuid('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->longText('isi_chat');
            $table->datetime('created_at', $precision = 0);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat');
    }
};
