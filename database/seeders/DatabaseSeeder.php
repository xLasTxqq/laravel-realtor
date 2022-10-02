<?php

namespace Database\Seeders;

use App\Models\Appartment;
use App\Models\Application;
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
            'password' => Hash::make('web2021'),
        ]);
        Appartment::factory(50)->create();
        Application::factory(100)->create();
    }
}
