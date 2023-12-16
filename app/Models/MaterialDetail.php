<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialDetail extends Model
{
    use HasFactory;
    protected $fillable = ['material_id','material_content'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
