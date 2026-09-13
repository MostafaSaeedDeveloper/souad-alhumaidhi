<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MediaOutlet extends Model
{
    protected $fillable = ['name', 'logo', 'website_url', 'country', 'sort_order', 'status'];

    public function pressMentions()
    {
        return $this->hasMany(PressMention::class);
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
