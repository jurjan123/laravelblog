<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ldate = date('Y-m-d H:i:s');
        DB::table("projects")->insert([
            [
                "title" => "Wintersport",
                "intro" => "Wintersport is een leuke vakantie",
                "image" => "Monkey-Puppet.png",
                "description" => "Wintersport is wel leuk",
               
                "created_at" => $ldate,
                "updated_at" => $ldate
            ],
            [
                "title" => "herfst",
                "intro" => "herfst is mijn minst favoriete seizoen",
                "image" => "Monkey-Puppet.png",
                "description" => "omdat het regent",
                "created_at" => $ldate,
                "updated_at" => $ldate
            ],
            [
                "title" => "Zomer",
                "intro" => "Zomer is mijn favoriete seizoen",
                "image" => "Monkey-Puppet.png",
                "description" => "Vanwege zomervakantie",
                "created_at" => $ldate,
                "updated_at" => $ldate
            ],
            [
                "title" => "Winter",
                "intro" => "Winter is koud",
                "image" => "Monkey-Puppet.png",
                "description" => "erg koud",
                "created_at" => $ldate,
                "updated_at" => $ldate
            ],
            [
                "title" => "Groningen",
                "intro" => "Beste",
                "image" => "Monkey-Puppet.png",
                "description" => "Provincie",
                "created_at" => $ldate,
                "updated_at" => $ldate
            ],
            ]);
    }
}
