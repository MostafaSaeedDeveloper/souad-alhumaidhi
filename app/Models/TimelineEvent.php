<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TimelineEvent extends Model
{
    protected $fillable = [
        'year', 'title', 'description', 'icon', 'image', 'source_name', 'source_url',
        'is_verified', 'sort_order', 'status',
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
        return $query->orderBy('sort_order')->orderBy('year');
    }
}
