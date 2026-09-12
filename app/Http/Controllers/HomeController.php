<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Article;
use App\Models\Biography;
use App\Models\GalleryItem;
use App\Models\Initiative;
use App\Models\MediaItem;
use App\Models\MediaOutlet;
use App\Models\Quote;
use App\Models\TimelineEvent;
use App\Support\Media;

class HomeController extends Controller
{
    public function index()
    {
        $biography = Biography::first();
        $timeline = TimelineEvent::published()->ordered()->get();
        $achievements = Achievement::published()->ordered()->take(8)->get();
        $mediaItems = MediaItem::published()->featured()->ordered()->take(4)->get();
        $galleryItems = GalleryItem::count() === 0
            ? Media::galleryFolderItems()->take(8)
            : GalleryItem::published()->ordered()->take(8)->get();
        $initiatives = Initiative::published()->ordered()->take(6)->get();
        $articles = Article::published()->ordered()->take(3)->get();
        $heroQuote = Quote::published()->type('her_quote')->featured()->ordered()->first();
        $bannerQuote = Quote::published()->featured()->ordered()->skip(1)->first() ?? $heroQuote;
        $testimonials = Quote::published()->type('testimonial')->ordered()->get();
        $mediaOutlets = MediaOutlet::published()->ordered()->get();

        return view('home', compact(
            'biography', 'timeline', 'achievements', 'mediaItems', 'galleryItems',
            'initiatives', 'articles', 'heroQuote', 'bannerQuote', 'testimonials', 'mediaOutlets'
        ));
    }
}
