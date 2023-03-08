<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Belongsto;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;


    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        "title",
        "description",
        "user_id"
    ];

    public function user():Belongsto
    {
        return $this->belongsTo(User::class);
    }



    
};
