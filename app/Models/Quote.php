<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['text', 'context', 'featured', 'sort_order', 'source_id'];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
