<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'post_category_post';

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryPost::class, 'category_id', 'id');
    }
}
