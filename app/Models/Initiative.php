<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    protected $fillable = [
        'title', 'slug', 'icon', 'summary', 'content', 'image', 'category',
        'source_name', 'source_url', 'is_verified', 'sort_order', 'status',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
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
        return $query->orderBy('sort_order');
    }
}
