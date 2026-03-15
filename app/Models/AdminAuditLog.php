<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAuditLog extends Model
{
    use HasFactory;

    protected $table = 'admin_audit_logs';

    protected $fillable = [
        'admin_id',
        'action_type',
        'target_table',
        'target_id',
        'old_values',
        'new_values',
        'ip_address'
    ];
}
