<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizSpecial extends Model
{
    use HasFactory;
    protected $fillable = ['material_id', 'number', 'question_text', 'option_a', 'option_b', 'option_c', 'option_d', 'answer'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
