<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = ['bab', 'title'];

    public function material_detail()
    {
        return $this->hasMany(MaterialDetail::class);
    }

    public function quiz_special()
    {
        return $this->hasMany(QuizSpecial::class);
    }
}
