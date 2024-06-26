<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $ldate = date('Y-m-d H:i:s');
        DB::table("products")->insert([
            [
                "name" => "voetbalschoenen",
                "price" => "60.00",
                "description" => "voor voetbal",
                "stock" => 50,
                "vat" => 21,
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            [
                "name" => "voetbalshirt",
                "stock" => 50,
                "vat" => 21,
                "price" => "40.00",
                "description" => "mooi blauw voetbalshirt",
                "created_at" => $ldate,
                "updated_at" => $ldate,
               
               
            ],
            [
                "name" => "golfbal",
                "stock" => 50,
                "vat" => 21,
                "price" => "10.00",
                "description" => "golfbal die erg hard is",
                "created_at" => $ldate,
                "updated_at" => $ldate,
               
                
            ],
            [
                "name" => "honkbalknuppel",
                "stock" => 50,
                "vat" => 21,
                "price" => "70.00",
                "description" => "lange honkbalknuppel",
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            [
                "name" => "keepershandschoenen",
                "stock" => 50,
                "vat" => 21,
                "price" => "30.00",
                "description" => "keeperhandschoenen met fingersafe",
                "created_at" => $ldate,
                "updated_at" => $ldate,
            ],
            ]);
    }
}
