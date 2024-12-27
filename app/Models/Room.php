<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Seat;
use App\Models\Cinema;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'room_seats' => 'json',
        'base_price' => 'float',
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'showtimes');
    }

    public function getBasePriceAttribute($value)
    {
        return rtrim(rtrim(number_format((float)$value, 2, '.', ''), '0'), '.');
    }
}
