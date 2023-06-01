<?php 

use App\Models\Product;
use Illuminate\Support\Benchmark;

Benchmark::dd([
    "scenario 1" => fn() => Product::count(),
]);