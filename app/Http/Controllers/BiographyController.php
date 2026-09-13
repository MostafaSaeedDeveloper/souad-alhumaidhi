<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\GalleryItem;
use App\Models\TimelineEvent;

class BiographyController extends Controller
{
    public function show()
    {
        $biography = Biography::firstOrFail();
        $timeline = TimelineEvent::published()->ordered()->get();
        $archiveImages = GalleryItem::published()->where('category', 'archive')->ordered()->take(6)->get();

        return view('biography', compact('biography', 'timeline', 'archiveImages'));
    }
}
