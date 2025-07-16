<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'ip_address',
        'user_agent',
        'referrer',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    
}
