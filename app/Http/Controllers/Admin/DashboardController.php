<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\GalleryItem;
use App\Models\Initiative;
use App\Models\MediaItem;
use App\Models\Tribute;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'achievements' => Achievement::count(),
            'media' => MediaItem::count(),
            'gallery' => GalleryItem::count(),
            'initiatives' => Initiative::count(),
            'articles' => Article::count(),
            'tributes_pending' => Tribute::where('status', 'pending')->count(),
            'tributes_total' => Tribute::count(),
            'contact_new' => ContactMessage::where('status', 'new')->count(),
        ];

        $latestTributes = Tribute::latest()->take(5)->get();
        $latestContacts = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestTributes', 'latestContacts'));
    }
}
