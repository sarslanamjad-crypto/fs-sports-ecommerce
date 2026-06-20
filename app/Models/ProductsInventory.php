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
        'image',
        'price',
        'current_stock',
        'is_activated',
        'is_in_house_brand',
        'discount_percentage',
        'discounted_price'
    ];

    protected static function booted()
    {
        static::saving(function ($product) {
            if (isset($product->discount_percentage) && (int)$product->discount_percentage > 0) {
                $product->discount_percentage = (int)$product->discount_percentage;
                $product->discounted_price = $product->price - ($product->price * ($product->discount_percentage / 100));
            } else {
                $product->discounted_price = null;
                $product->discount_percentage = null;
            }
        });

        static::created(function ($product) {
            \App\Models\StockManagement::updateOrCreate(
                ['product_id' => $product->id, 'branch_id' => 1],
                [
                    'current_stock_qty' => $product->current_stock,
                    'low_stock_threshold' => 10
                ]
            );
        });

        static::updated(function ($product) {
            \App\Models\StockManagement::updateOrCreate(
                ['product_id' => $product->id, 'branch_id' => 1],
                [
                    'current_stock_qty' => $product->current_stock,
                ]
            );
        });

        static::deleted(function ($product) {
            \App\Models\StockManagement::where('product_id', $product->id)->delete();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_activated', 1);
    }
}
