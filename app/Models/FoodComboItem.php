<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodComboItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'food_combo_items';

    protected $guarded = [];

    public function combo(){
        return $this->belongsTo(FoodCombo::class, 'food_combo_id', 'id');
    }

    public function food(){
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }
}
