<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPurchase extends Model
{
    use HasFactory;

    protected $table = 'group_purchases';

    protected $fillable = [
        'product_id',
        'group_lead_id',
        'current_members',
        'discount_rate',
        'status'
    ];
}
