<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'title', 'alt', 'caption', 'image', 'category', 'source_name', 'source_url',
        'copyright_note', 'is_verified', 'sort_order', 'status',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderByDesc('id');
    }
}
