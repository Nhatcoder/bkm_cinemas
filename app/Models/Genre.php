<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'genres';

    protected $guarded = [];

    public function childs()
    {
        return $this->hasMany(Genre::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Genre::class, 'parent_id', 'id');
    }

    // Hàm đệ quy để lấy tất cả các mục con
    public function childrenRecursive()
    {
        return $this->childs()->with('childrenRecursive');
    }

    public function movieGenres()
    {
        return $this->hasMany(MovieGenre::class, 'genre_id', 'id');
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre', 'genre_id', 'movie_id');
    }
}
