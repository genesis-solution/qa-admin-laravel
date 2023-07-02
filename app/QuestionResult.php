<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionResult extends Model
{
    use HasFactory;

    public $table = 'question_results';

    protected $fillable = [
        'user_id',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'result',
    ];
}
