<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "order_adresses";

    protected $fillable = [
        "type",
        "order_id",
        "first_name",
        "last_name",
        "street",
        "house_number",
        "postal_code",
        "city",
        "phone_number",
        "email_adress",
    ];
}
