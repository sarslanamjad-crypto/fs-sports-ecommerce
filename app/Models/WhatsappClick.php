<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappClick extends Model
{
    use HasFactory;

    protected $table = 'whatsapp_clicks';
    protected $fillable = ['ip_address', 'user_agent'];
}
