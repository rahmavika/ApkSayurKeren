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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id(); // Primary key, auto increment
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan tabel users
            $table->text('alamat_pengiriman'); // Alamat lengkap pengiriman
            $table->decimal('total_harga', 10, 2); // Total harga
            $table->json('produk_details'); // JSON untuk detail produk
            $table->timestamp('tanggal_pemesanan')->useCurrent(); // Tanggal dan waktu pemesanan
            $table->enum('status', ['diproses', 'dikirim', 'selesai']); // Status pemesanan
            $table->string('bukti_transfer')->nullable(); // Path file bukti transfer, bisa kosong
            $table->text('catatan_admin')->nullable(); // Catatan dari admin terkait pesanan
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
