<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = 'site_settings';

    protected $fillable = [
        'shop_name',
        'logo',
        'about_us_title',
        'about_us_content',
        'store_location_data',
        'rent_info'
    ];
}
