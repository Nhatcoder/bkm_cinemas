<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'foods';

    protected $guarded = [];

    public function type(){
        return $this->belongsTo(FoodType::class, 'food_type_id');
    }

    public function items(){
        return $this->hasMany(FoodComboItem::class, 'food_id', 'id');
    }

    public function combos(){
        return $this->belongsToMany(FoodCombo::class, 'food_combo_items', 'food_id', 'food_combo_id');
    }
}
