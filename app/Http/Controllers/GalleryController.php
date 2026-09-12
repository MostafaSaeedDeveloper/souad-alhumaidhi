<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use App\Support\Media;
use Illuminate\Pagination\LengthAwarePaginator;

class GalleryController extends Controller
{
    public function index()
    {
        $category = request('category');

        if (GalleryItem::count() === 0) {
            $files = Media::galleryFolderItems();
            $galleryItems = new LengthAwarePaginator($files, $files->count(), 16, 1, ['path' => request()->url()]);
            $categories = collect();
        } else {
            $galleryItems = GalleryItem::published()
                ->when($category, fn ($q) => $q->where('category', $category))
                ->ordered()->paginate(16);

            $categories = GalleryItem::published()->pluck('category')->filter()->unique();
        }

        return view('gallery.index', compact('galleryItems', 'categories', 'category'));
    }
}
