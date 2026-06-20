<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'unit_price',
        'quantity',
        'subtotal'
    ];

    /**
     * Get the virtual price_at_purchase attribute.
     */
    public function getPriceAtPurchaseAttribute()
    {
        return $this->unit_price;
    }

    /**
     * Relationship to the product.
     */
    public function product()
    {
        return $this->belongsTo(ProductsInventory::class, 'product_id');
    }
}
