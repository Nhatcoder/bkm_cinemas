<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModulePermission extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'module_permissions';

    protected $guarded = [];
}
