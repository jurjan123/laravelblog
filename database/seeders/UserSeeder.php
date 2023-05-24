<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /*
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $ldate = date('Y-m-d H:i:s');
       //User::truncate();

        DB::table("users")->insert([
            [
                "name" => "Admin",
                "email" => "Admin@gmail.com",
                "password" => Hash::make("Welkom123"),
                "is_admin" => "1",
                "user_image" => "preset.png",
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "role_id" => 1,
                
            ],
            [
                "name" => "user",
                "email" => "user@gmail.com",
                "password" => Hash::make("Welkom123"),
                "is_admin" => "0",
                "user_image" => "preset.png",
                "created_at" => $ldate,
                "updated_at" => $ldate,
                "role_id" => 2,
                
            ]
            ]);
       }
       
    }

