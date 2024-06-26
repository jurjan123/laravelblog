<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Projects;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            StatusSeeder::class,
            ProjectSeeder::class,
            Roleseeder::class,
            UserSeeder::class,
            TaskSeeder::class,
            PostSeeder::class,
            ProductSeeder::class
        ]);
    }
}
