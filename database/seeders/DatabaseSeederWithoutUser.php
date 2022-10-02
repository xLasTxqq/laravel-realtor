<?php

namespace Database\Seeders;

use App\Models\Appartment;
use App\Models\Application;
use Illuminate\Database\Seeder;

class DatabaseSeederWithoutUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appartment::factory(50)->create();
        Application::factory(100)->create();
    }
}
