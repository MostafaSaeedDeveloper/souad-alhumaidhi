<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiographySection extends Model
{
    protected $fillable = ['slug', 'title', 'body', 'sort_order', 'source_id'];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
