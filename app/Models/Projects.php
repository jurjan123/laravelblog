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
        "user_id",
        "image"
    ];

    public function user():Belongsto
    {
        return $this->belongsTo(User::class);
    }



    
};