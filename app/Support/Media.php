<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
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
     * Save an upload flat at the uploads disk root (no subdirectory), so PHP never needs to
     * create a directory at request time. Some hosts leave public/uploads itself writable but
     * deny the web server permission to create new subfolders inside it — storing everything at
     * one level avoids that failure mode entirely. Uniqueness comes from the prefix + a random
     * suffix, not a folder.
     */
    public static function store(UploadedFile $file, string $prefix): string
    {
        $filename = $prefix.'-'.Str::random(12).'.'.$file->extension();

        return $file->storeAs('', $filename, self::DISK);
    }

    /**
     * Zero-config fallback: any real image file dropped directly into
     * public/uploads/ with a "gallery-" filename prefix (e.g. gallery-1.jpg)
     * shows up as a lightweight gallery entry — no subfolder, no admin
     * entry, no code change required. Flat on purpose: some hosts allow
     * writing into public/uploads/ itself but deny creating subfolders in it.
     */
    public static function galleryFolderItems(): Collection
    {
        return collect(Storage::disk(self::DISK)->files())
            ->filter(fn ($path) => str_starts_with(basename($path), 'gallery-')
                && in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp']))
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
