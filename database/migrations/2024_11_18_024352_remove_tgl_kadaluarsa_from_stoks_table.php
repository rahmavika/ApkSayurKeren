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
        // Menghapus kolom tanggal_kadaluarsa dari tabel stoks
        Schema::table('stoks', function (Blueprint $table) {
            $table->dropColumn('tgl_kadaluarsa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Jika migration ini dibalik, tambahkan kembali kolom tanggal_kadaluarsa
        Schema::table('stoks', function (Blueprint $table) {
            $table->date('tgl_kadaluarsa')->nullable();
        });
    }
};
