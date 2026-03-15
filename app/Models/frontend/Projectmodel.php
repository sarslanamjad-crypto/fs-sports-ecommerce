<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectmodel extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $primary_key = "id";
}
