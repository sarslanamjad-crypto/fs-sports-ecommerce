<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoProfile extends Model
{
    use HasFactory;

    protected $table = 'video_profiles';

    protected $fillable = [
        'user_id',
        'product_id',
        'video_url',
        'is_approved',
        'view_count'
    ];
}
