<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'unit_price',
        'subtotal'
    ];

    /**
     * Get the product associated with this cart item
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductsInventory::class, 'product_id');
    }
}
