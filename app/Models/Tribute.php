<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tribute extends Model
{
    protected $fillable = ['name', 'email', 'city', 'message', 'consent_to_publish', 'status', 'ip_address'];

    protected $casts = [
        'consent_to_publish' => 'boolean',
    ];

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', 'approved')->where('consent_to_publish', true);
    }
}
