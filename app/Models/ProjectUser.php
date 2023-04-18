<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    use HasFactory;

    protected $table = "project_user";

    protected $fillable = [
        "user_id",
        "project_id",
        "role_id"
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, "role_id");
    }

    public function project()
    {
        return $this->belongsTo(Project::class, "project_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
