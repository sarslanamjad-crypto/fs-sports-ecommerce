<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePaymentLog extends Model
{
    use HasFactory;

    protected $table = 'online_payment_logs';

    protected $fillable = [
        'order_id',
        'gateway_name',
        'response_code',
        'payment_status'
    ];
}
