<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingFood extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'booking_foods';

    protected $guarded = [];

    public function food(){
        return $this->belongsTo(Food::class);
    }
}
