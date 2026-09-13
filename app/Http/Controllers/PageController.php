<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Award;
use App\Models\BiographySection;
use App\Models\GalleryAlbum;
use App\Models\Initiative;
use App\Models\MediaItem;
use App\Models\Position;
use App\Models\PressMention;
use App\Models\Quote;
use App\Models\Source;
use App\Models\TimelineEvent;
use App\Services\YouTubeService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'biographyIntro' => BiographySection::ordered()->limit(1)->get(),
            'timelineEvents' => TimelineEvent::ordered()->get(),
            'achievements' => Achievement::ordered()->get(),
            'initiatives' => Initiative::ordered()->get(),
            'mediaItems' => MediaItem::ordered()->with('source')->get(),
            'pressMentions' => PressMention::ordered()->get(),
            'featuredQuote' => Quote::featured()->ordered()->first(),
            'galleryAlbums' => GalleryAlbum::ordered()->with('images')->get(),
        ]);
    }

    public function biography(): View
    {
        return view('pages.biography', [
            'sections' => BiographySection::ordered()->with('source')->get(),
            'positions' => Position::ordered()->with('source')->get(),
        ]);
    }

    public function timeline(): View
    {
        return view('pages.timeline', [
            'timelineEvents' => TimelineEvent::ordered()->with('source')->get(),
        ]);
    }

    public function achievements(): View
    {
        return view('pages.achievements', [
            'achievements' => Achievement::ordered()->with('source')->get(),
            'awards' => Award::ordered()->with('source')->get(),
            'positions' => Position::ordered()->with('source')->get(),
        ]);
    }

    public function media(Request $request, YouTubeService $youTube): View
    {
        $category = $request->string('category')->toString();

        $query = MediaItem::ordered()->with('source');

        if ($category !== '' && $category !== 'all') {
            $query->where('category', $category);
        }

        return view('pages.media', [
            'mediaItems' => $query->paginate(9)->withQueryString(),
            'category' => $category ?: 'all',
        ]);
    }

    public function gallery(): View
    {
        return view('pages.gallery', [
            'albums' => GalleryAlbum::ordered()->with('images.source')->get(),
        ]);
    }

    public function initiatives(): View
    {
        return view('pages.initiatives', [
            'initiatives' => Initiative::ordered()->with('source')->get(),
        ]);
    }

    public function press(): View
    {
        return view('pages.press', [
            'pressMentions' => PressMention::ordered()->with('source')->paginate(10),
        ]);
    }

    public function sources(): View
    {
        return view('pages.sources', [
            'sources' => Source::query()->orderBy('publisher')->get(),
        ]);
    }
}
