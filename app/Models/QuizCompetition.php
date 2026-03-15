<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizCompetition extends Model
{
    use HasFactory;

    protected $table = 'quiz_competitions';

    protected $fillable = [
        'title',
        'reward_description',
        'start_date',
        'end_date'
    ];
}
