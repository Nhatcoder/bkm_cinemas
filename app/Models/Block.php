<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Block extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blocks';

    protected $guarded = [];

    public function blockType()
    {
        return $this->belongsTo(BlockType::class, 'block_type_id', 'id');
    }

    public function blockContents()
    {
        return $this->hasMany(BlockContent::class, 'block_id', 'id');
    }
}
