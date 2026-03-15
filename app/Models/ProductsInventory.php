<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsInventory extends Model
{
    use HasFactory;

    protected $table = 'products_inventory';

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'current_stock',
        'is_activated',
        'is_in_house_brand'
    ];
}
