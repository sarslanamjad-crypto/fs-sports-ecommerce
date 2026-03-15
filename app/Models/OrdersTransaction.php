<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersTransaction extends Model
{
    use HasFactory;

    protected $table = 'orders_transactions';

    protected $fillable = [
        'user_id',
        'order_reference_id',
        'total_amount',
        'order_status'
    ];
}
