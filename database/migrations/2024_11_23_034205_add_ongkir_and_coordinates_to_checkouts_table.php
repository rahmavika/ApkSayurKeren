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
        Schema::table('checkouts', function (Blueprint $table) {
            $table->decimal('ongkir', 10, 2)->nullable()->after('total_harga');
            $table->decimal('latitude', 10, 7)->nullable()->after('alamat_pengiriman');
            $table->decimal('longitude', 10, 7)->nullable()->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkouts', function (Blueprint $table) {
            //
        });
    }
};
