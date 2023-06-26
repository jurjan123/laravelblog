<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "total_exc",
        "vat",
        "total_inc"
    ];

    public function Customers(){
        return $this->hasMany(Customer::class);
    }
}
