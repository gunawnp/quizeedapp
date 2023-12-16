<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizGeneral extends Model
{
    use HasFactory;
    protected $fillable = ['number_quiz', 'material_id'];

    public function quiz_general_detail()
    {
        return $this->hasMany(QuizGeneralDetail::class);
    }
}
