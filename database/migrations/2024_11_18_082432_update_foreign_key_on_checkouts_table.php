<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement('ALTER TABLE checkouts DROP FOREIGN KEY checkouts_user_id_foreign');
        DB::statement('ALTER TABLE checkouts ADD CONSTRAINT checkouts_user_id_foreign FOREIGN KEY (user_id) REFERENCES penggunas(id) ON DELETE CASCADE');
    }

    public function down()
    {
        DB::statement('ALTER TABLE checkouts DROP FOREIGN KEY checkouts_user_id_foreign');
    }

};
