<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $table = "users";
    

    protected $fillable = [
        'name',
        'email',
        "user_image",
        "is_admin",
        "password",
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        //"role" => User::USER,
    ];


    public function projects()
    {
        return $this->belongsToMany(Project::class)->withTimestamps()->withPivot(['role_id'])->using(ProjectUser::class);    }

    public function projectRoles()
    {
        return $this->belongsToMany(Role::class)->withPivot("role_id");
    }

    public function role()
    {
        return $this->belongsTo(Role::class, "role_id");
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }



   
    public function getDefaultLocaleAttribute(): string
    {
        return config('app.locale');
    }
}


