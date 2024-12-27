<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cities';

    protected $guarded = [];

    public function areas()
    {
        return $this->hasMany(Area::class, 'city_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($city) {
            $city->areas()->delete();
        });
    }
}
