<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "created_at", "active", "status_id"];

    public function statuses()
    {
        return $this->belongsTo(Status::class, "status_id");
    }
}
