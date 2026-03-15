<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceReport extends Model
{
    use HasFactory;

    protected $table = 'finance_reports';

    protected $fillable = [
        'branch_id',
        'total_revenue',
        'cash_total',
        'debit_total',
        'report_date'
    ];
}
