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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama promo
            $table->text('deskripsi')->nullable(); // Deskripsi promo (opsional)
            $table->decimal('diskon', 5, 2); // Diskon dalam persen, contoh: 10.00 untuk 10%
            $table->date('tanggal_mulai'); // Tanggal mulai promo
            $table->date('tanggal_berakhir'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
