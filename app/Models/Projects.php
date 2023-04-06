<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Belongsto;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Projects extends Model
{
    use HasFactory;

    protected $table = "projects";

    protected $fillable = [
        "title",
        "description",
        "intro",
        "created_at",
        "image"
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, "project_user", "project_id", "user_id")
        ->withTimestamps();
    }

    
};