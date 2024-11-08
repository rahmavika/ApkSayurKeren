<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('penggunas')->updateOrInsert(
            ['email' => 'admin1@gmail.com'], // Kondisi pencarian
            [
                'username' => 'Admin1', // Sesuaikan dengan kolom 'username'
                'nohp' => '081234567890', // Tambahkan nomor telepon
                'password' => Hash::make('admin1'), // Password terenkripsi
                'role' => 'admin',
            ]
        );

        DB::table('penggunas')->updateOrInsert(
            ['email' => 'admin2@gmail.com'],
            [
                'username' => 'Admin2',
                'nohp' => '081234567891',
                'password' => Hash::make('admin2'),
                'role' => 'admin',
            ]
        );
    }
}
