<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'food_types';

    protected $guarded = [];

    public function foods(){
        return $this->hasMany(Food::class, 'food_type_id', 'id');
    }
}
