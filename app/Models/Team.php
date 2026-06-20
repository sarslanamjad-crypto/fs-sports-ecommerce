<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    protected $fillable = [
        'fullname',
        'email',
        'designation',
        'shortintro',
        'longintro',
        'linkedin',
        'insta',
        'twitter',
        'facebook',
        'image',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
