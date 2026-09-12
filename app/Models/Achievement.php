<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'icon', 'summary', 'content', 'image', 'year',
        'source_name', 'source_url', 'is_verified', 'is_featured', 'sort_order', 'status',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderByDesc('year');
    }
}
