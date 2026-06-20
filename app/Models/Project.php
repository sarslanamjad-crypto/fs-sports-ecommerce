<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'title',
        'price',
        'details',
        'link',
        'category',
        'technology',
        'image',
        'client',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
