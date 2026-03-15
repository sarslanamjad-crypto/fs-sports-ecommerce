<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufacturingPartner extends Model
{
    use HasFactory;

    protected $table = 'manufacturing_partners';

    protected $fillable = [
        'organization_name',
        'contract_start_date',
        'quality_score'
    ];
}
