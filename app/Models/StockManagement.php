<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockManagement extends Model
{
    use HasFactory;

    protected $table = 'stock_management';

    protected $fillable = [
        'product_id',
        'branch_id',
        'current_stock_qty',
        'low_stock_threshold'
    ];
}
