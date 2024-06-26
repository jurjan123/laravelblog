<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ldate = date('Y-m-d H:i:s');
        DB::table("categories")->insert([
            [
                "name" => "wintersport",
                "tag" => "gaat over wintersport",
                "image" =>  "Monkey-Puppet.png",
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            [
                "name" => "herfst",
                "tag" => "gaat over herfst",
                "image" =>  "Monkey-Puppet.png",
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            [
                "name" => "winter",
                "tag" => "gaat over winter",
                "image" =>  "Monkey-Puppet.png",
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            [
                "name" => "zomer",
                "tag" => "gaat over zomer",
                "image" =>  "Monkey-Puppet.png",
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            [
                "name" => "groningen",
                "tag" => "gaat over groningen",
                "image" =>  "Monkey-Puppet.png",
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            ]);
    }
}
