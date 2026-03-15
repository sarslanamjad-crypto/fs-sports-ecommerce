<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesPermission extends Model
{
    use HasFactory;

    protected $table = 'roles_permissions';

    protected $fillable = [
        'role_name',
        'slug',
        'description',
        'can_manage_admins',
        'can_manage_staff'
    ];
}
