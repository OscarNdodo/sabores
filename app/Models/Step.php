<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $fillable = [
        'recipe_id',
        'step_number',
        'title',
        'instruction',
        'image',
        'optional',
        'level'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function isOptional()
    {
        return $this->optional;
    }

    public function setOptional($value)
    {
        $this->optional = $value;
        $this->save();
    }

    
}
