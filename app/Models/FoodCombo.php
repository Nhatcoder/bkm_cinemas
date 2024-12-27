<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodCombo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'food_combos';

    protected $guarded = [];

    public function items(){
        return $this->hasMany(FoodComboItem::class, 'food_combo_id', 'id');
    }

    public function foods(){
        return $this->belongsToMany(Food::class, 'food_combo_items', 'food_combo_id', 'food_id');
    }
}
