<?php

namespace App\Http\Controllers;

use App\Models\MediaItem;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');

        $mediaItems = MediaItem::published()->category($category)->ordered()
            ->paginate(9)->withQueryString();

        $categories = MediaItem::published()->pluck('category')->filter()->unique();

        return view('media.index', compact('mediaItems', 'categories', 'category'));
    }

    public function show(MediaItem $media)
    {
        abort_unless($media->status === 'published', 404);

        $related = MediaItem::published()->where('id', '!=', $media->id)->ordered()->take(3)->get();

        return view('media.show', compact('media', 'related'));
    }
}
