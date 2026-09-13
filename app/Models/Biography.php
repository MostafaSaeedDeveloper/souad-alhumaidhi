<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    protected $fillable = [
        'full_name', 'title', 'birth_year', 'death_year', 'nationality', 'image',
        'intro', 'early_life', 'career', 'contributions', 'honors', 'full_content',
        'source_name', 'source_url', 'is_verified',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
    ];
}
