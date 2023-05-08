<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ldate = date('Y-m-d H:i:s');
        DB::table("statuses")->insert([
            [
                "name" => "Open",
                
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            [
                "name" => "Gesloten",
               
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            [
                "name" => "Afgerond",
                
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            [
                "name" => "Weinig gedaan",
                
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            [
                "name" => "Bijna klaar",
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            ]);
    }
}
