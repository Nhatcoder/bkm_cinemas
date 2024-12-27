<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'category_posts';

    protected $guarded = [];

    public function childs()
    {
        return $this->hasMany(CategoryPost::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(CategoryPost::class, 'parent_id', 'id');
    }

    // Hàm đệ quy để lấy tất cả các mục con
    public function childrenRecursive()
    {
        return $this->childs()->with('childrenRecursive');
    }

    public function postCategories()
    {
        return $this->hasMany(PostCategory::class, 'category_id', 'id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category_post', 'category_id', 'post_id');
    }
}
