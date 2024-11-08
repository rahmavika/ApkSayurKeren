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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('username'); // Username untuk pelanggan, pengantar, dan pengelola
            $table->string('email')->unique(); // Email yang unik
            $table->string('nohp')->nullable(); // Nomor HP, hanya untuk pelanggan
            $table->string('password'); // Password yang di-hash
            $table->enum('role', ['pelanggan', 'admin', 'pengelola', 'pengantar']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
