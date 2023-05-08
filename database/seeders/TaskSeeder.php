<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ldate = date('Y-m-d H:i:s');
        DB::table("tasks")->insert([
            [
                "name" => "Open",
                "description" => "hij is Open",
                "active" => 0,
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "status_id" => 1
            ],
            [
                "name" => "Gesloten",
                "description" => "hij is gesloten",
                "active" => 0,
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "status_id" => 1
            ],
            [
                "name" => "Afgerond",
                "description" => "hij is afgerond",
                "active" => 0,
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "status_id" => 1
            ],
            [
                "name" => "Weinig gedaan",
                "description" => "er is weinig gedaan",
                "active" => 0,
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "status_id" => 1
            ],
            [
                "name" => "Bijna klaar",
                "description" => "hij is bijna klaar",
                "active" => 0,
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "status_id" => 1
            ],
            ]);
    }
}
