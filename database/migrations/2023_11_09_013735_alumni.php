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
        Schema::create("alumni", function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_users');
            $table->foreign('id_users')->references('id')->on('users');
            $table->enum('is_verified', ['verified', 'pending', 'not-verified'])->default('pending');
            $table->boolean('is_lulusan')->nullable();
            $table->enum('status', ['kerja', 'melamar', 'belum-bekerja'])->default('belum-bekerja');
            $table->text('cv');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
