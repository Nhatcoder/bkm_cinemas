<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingFoodCombo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'booking_food_combos';

    protected $guarded = [];
}
