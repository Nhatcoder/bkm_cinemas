<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $guarded = [];

    public $timestamps = false;

    // Mối quan hệ với Role: nhiều-nhiều
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
    }

    // Mối quan hệ với Module: nhiều-1 (một Permission thuộc về một Module)
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class, 'permission_id');
    }
}
