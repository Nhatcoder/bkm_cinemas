<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'vouchers';

    protected $guarded = [];
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_vouchers', 'voucher_id', 'user_id')->withTimestamps();
    }
}
