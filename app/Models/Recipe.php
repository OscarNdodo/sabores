<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'duration',
        'image',
        'level',
        'status',
        'category',
        'type',
        'youtube_video'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function tips()
    {
        return $this->hasMany(Tip::class);
    }

    public function isDraft()
    {
        return $this->status === 'draft';
    }

  
}
