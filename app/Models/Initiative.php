<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    protected $fillable = ['title', 'location', 'description', 'icon', 'sort_order', 'source_id'];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
