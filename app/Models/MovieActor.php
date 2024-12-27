<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovieActor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'movie_actors';

    protected $guarded = [];

    public function actor()
    {
        return $this->belongsTo(Actor::class, 'actor_id');
    }
}
