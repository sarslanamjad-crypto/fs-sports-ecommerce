<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\frontend\Projectmodel;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'user_id',
        'project_id',
        'quantity',
    ];

    public function project()
    {
        return $this->belongsTo(Projectmodel::class, 'project_id');
    }
}
