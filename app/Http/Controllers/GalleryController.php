<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;

class GalleryController extends Controller
{
    public function index()
    {
        $category = request('category');

        $galleryItems = GalleryItem::published()
            ->when($category, fn ($q) => $q->where('category', $category))
            ->ordered()->paginate(16);

        $categories = GalleryItem::published()->pluck('category')->filter()->unique();

        return view('gallery.index', compact('galleryItems', 'categories', 'category'));
    }
}
