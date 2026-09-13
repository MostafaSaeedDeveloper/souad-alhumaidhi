<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PressMention extends Model
{
    protected $fillable = ['title', 'publisher', 'url', 'published_at', 'excerpt', 'sort_order', 'source_id'];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
