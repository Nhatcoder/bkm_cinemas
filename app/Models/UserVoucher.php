<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVoucher extends Model
{
    use HasFactory;
    protected $table = 'user_vouchers';
    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
