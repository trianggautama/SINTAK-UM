<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'Admin Bagian Hukum',
            'username' => 'Baghukum',
            'password' => Hash::make('Baghukum'),
            'role'=>'1',
        ]);
    }
}
