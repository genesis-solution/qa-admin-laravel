<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionContent extends Model
{
    use HasFactory;

    public $table = 'question_contents';

    protected $fillable = [
        'question_id',
        'image_path',
        'desc',
        'q1',
        'q1_marks',
        'q2',
        'q2_marks',
        'q3',
        'q3_marks',
        'q4',
        'q4_marks',
    ];
}
