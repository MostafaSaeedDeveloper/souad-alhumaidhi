<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    protected $fillable = ['title', 'category', 'sort_order'];

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
