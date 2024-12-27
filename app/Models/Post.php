<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'board');
    }

    public function postCategories()
    {
        return $this->hasMany(PostCategory::class, 'post_id', 'id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'record_id');
    }

    public function categories()
    {
        return $this->belongsToMany(CategoryPost::class, 'post_category_post', 'post_id', 'category_id');
    }
}
