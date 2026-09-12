<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PressMention extends Model
{
    protected $fillable = ['media_outlet_id', 'title', 'url', 'published_at', 'sort_order', 'status'];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function mediaOutlet()
    {
        return $this->belongsTo(MediaOutlet::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }
}
