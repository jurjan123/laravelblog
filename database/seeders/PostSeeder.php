<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ldate = date('Y-m-d H:i:s');
        DB::table("posts")->insert([
            [
                "title" => "Wintersport",
                "intro" => "Wintersport is een leuke vakantie",
                "image" => "Monkey-Puppet.png",
                "description" => "Wintersport is wel leuk",
               
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "category_id" => 1,
                "user_id" => 1
            ],
            [
                "title" => "herfst",
                "intro" => "herfst is mijn minst favoriete seizoen",
                "image" => "Monkey-Puppet.png",
                "description" => "omdat het regent",
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "category_id" => 1,
                "user_id" => 1
            ],
            [
                "title" => "Zomer",
                "intro" => "Zomer is mijn favoriete seizoen",
                "image" => "Monkey-Puppet.png",
                "description" => "Vanwege zomervakantie",
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "category_id" => 1,
                "user_id" => 1
            ],
            [
                "title" => "Winter",
                "intro" => "Winter is koud",
                "image" => "Monkey-Puppet.png",
                "description" => "erg koud",
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "category_id" => 1,
                "user_id" => 1,
            ],
            [
                "title" => "Groningen",
                "intro" => "Beste",
                "image" => "Monkey-Puppet.png",
                "description" => "Provincie",
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "category_id" => 1,
                "user_id" => 1,
            ],
            ]);
    }
}
