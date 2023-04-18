<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
        [
            "name" => "admin"
        ],
        [
            "name" => "gebruiker"
        ],
        [
            "name" => "bewerker"
        ],
        [
            "name" => "jur"
        ],
    
    ]
    
    );
    }
}
