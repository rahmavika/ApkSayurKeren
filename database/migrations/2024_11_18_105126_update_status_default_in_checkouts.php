<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->enum('status', ['pesanan diterima', 'diproses', 'dikirim', 'selesai'])
                ->default('pesanan diterima')->change();
        });
    }

    public function down()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            // Kembalikan perubahan jika dibutuhkan
            $table->enum('status', ['pesanan diterima', 'diproses', 'dikirim', 'selesai'])->change();
        });
    }

};
