<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MediaItem extends Model
{
    protected $table = 'media_items';

    protected $fillable = [
        'title', 'slug', 'description', 'youtube_url', 'youtube_id', 'thumbnail',
        'channel_name', 'published_at', 'source_name', 'source_url',
        'is_verified', 'is_featured', 'sort_order', 'status',
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

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderByDesc('published_at');
    }

    public function embedUrl(): ?string
    {
        return $this->youtube_id ? "https://www.youtube.com/embed/{$this->youtube_id}" : null;
    }
}
