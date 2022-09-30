<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'login' => 'manager',
//            'email' => 'admin'.'@gmail.com',
            'password' => Hash::make('web2021'),
//            'role'=> 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
