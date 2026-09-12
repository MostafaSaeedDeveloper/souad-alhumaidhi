<?php

namespace App\Support;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Media
{
    public const DISK = 'uploads';

    /**
     * Resolve an "uploads" disk relative path to a URL, but only if the file
     * actually exists on disk. Returns null otherwise so views can fall
     * back to a minimal placeholder instead of a broken <img>.
     */
    public static function url(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        return Storage::disk(self::DISK)->exists($path) ? Storage::disk(self::DISK)->url($path) : null;
    }

    /**
     * Zero-config fallback: any real image file dropped directly into
     * public/uploads/media/souad/gallery/ shows up as a lightweight
     * gallery entry, with no admin entry or code change required.
     */
    public static function galleryFolderItems(): Collection
    {
        return collect(Storage::disk(self::DISK)->files('media/souad/gallery'))
            ->filter(fn ($path) => in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp']))
            ->values()
            ->map(fn ($path) => (object) [
                'image' => $path,
                'alt' => 'سعاد الحميضي — '.Str::headline(pathinfo($path, PATHINFO_FILENAME)),
                'caption' => null,
                'source_name' => null,
                'source_url' => null,
            ]);
    }
}
