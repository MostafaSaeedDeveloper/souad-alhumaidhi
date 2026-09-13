<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = [
        'title', 'publisher', 'url', 'source_type', 'published_at', 'accessed_at', 'notes',
    ];

    protected $casts = [
        'published_at' => 'date',
        'accessed_at' => 'date',
    ];
}
