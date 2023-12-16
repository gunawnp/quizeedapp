<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizGeneralDetail extends Model
{
    use HasFactory;
    protected $fillable = ['quiz_general_id', 'number', 'question_text', 'option_a', 'option_b', 'option_c', 'option_d', 'answer'];

    public function quiz_general()
    {
        return $this->belongsTo(QuizGeneral::class);
    }
}
