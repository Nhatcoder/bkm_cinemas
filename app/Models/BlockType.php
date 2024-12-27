<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlockType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'block_types';

    protected $guarded = [];

    public function blocks()
    {
        return $this->hasMany(Block::class, 'block_type_id', 'id');
    }

}
