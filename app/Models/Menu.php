<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'menus';

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->childs()->with('childrenRecursive');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'record_id');
    }
}
