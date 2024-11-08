<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Di dalam migration file
    public function up()
    {
        Schema::table('stoks', function (Blueprint $table) {
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('stoks', function (Blueprint $table) {
            $table->dropForeign(['produk_id']);
        });
    }

};
