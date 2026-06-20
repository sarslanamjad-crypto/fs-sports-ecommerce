<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginSecurityLog extends Model
{
    use HasFactory;

    protected $table = 'login_security_logs';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'ip_address',
        'attempt_count',
        'is_successful',
        'user_agent',
        'locked_until',
        'logged_at'
    ];
}
