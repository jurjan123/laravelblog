<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;

    protected $table = "roles";
    protected $fillable = ["name"];
    
    public function projectUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    

}
