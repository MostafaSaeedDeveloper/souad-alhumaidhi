<?php

namespace App\Http\Controllers;

use App\Models\MediaItem;

class MediaController extends Controller
{
    public function index()
    {
        $mediaItems = MediaItem::published()->ordered()->paginate(9);

        return view('media.index', compact('mediaItems'));
    }

    public function show(MediaItem $media)
    {
        abort_unless($media->status === 'published', 404);

        $related = MediaItem::published()->where('id', '!=', $media->id)->ordered()->take(3)->get();

        return view('media.show', compact('media', 'related'));
    }
}
