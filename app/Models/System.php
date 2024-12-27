<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class System extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'systems';

    protected $guarded = [];

    public function childs()
    {
        return $this->hasMany(System::class, 'type', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(System::class, 'type', 'id');
    }
}
