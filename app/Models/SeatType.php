<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatType extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'is_system' => 'boolean',
        'bonus_price' => 'double',
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class, 'type', 'name');
    }
}
