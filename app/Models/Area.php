<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'areas';

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function cinemas()
    {
        return $this->hasMany(Cinema::class, 'area_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'city_id');
    }

}
