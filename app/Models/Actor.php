<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'actors';

    protected $guarded = [];
    public function movie_actor()
    {
        return $this->hasMany(MovieActor::class, 'actor_id', 'id');
    }
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_actor', 'actor_id');
    }
}
