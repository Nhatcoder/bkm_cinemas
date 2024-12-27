<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Room;
class Cinema extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cinemas';

    protected $guarded = [];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function city(){
        return $this->hasOneThrough(
            City::class,
            Area::class,
            'id',
            'id',
            'area_id',
            'city_id'
        );
    }

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
