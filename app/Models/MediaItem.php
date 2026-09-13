<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaItem extends Model
{
    protected $fillable = [
        'title', 'channel', 'category', 'youtube_url', 'youtube_id',
        'thumbnail_url', 'published_at', 'duration', 'sort_order', 'source_id',
    ];

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

    public function getEmbedUrlAttribute(): ?string
    {
        if (! $this->youtube_id) {
            return null;
        }

        return (new \App\Services\YouTubeService())->embedUrl($this->youtube_id);
    }
}
