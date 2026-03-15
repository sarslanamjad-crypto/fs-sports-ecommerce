<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffManagement extends Model
{
    use HasFactory;

    protected $table = 'staff_management';

    protected $fillable = [
        'staff_name',
        'designation',
        'phone',
        'email',
        'joining_date',
        'is_active'
    ];
}
