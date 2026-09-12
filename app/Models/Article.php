<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image', 'source_name', 'source_url',
        'published_at', 'is_verified', 'is_featured', 'sort_order', 'status',
    ];

    protected $casts = [
        'published_at' => 'date',
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

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderByDesc('published_at');
    }
}
