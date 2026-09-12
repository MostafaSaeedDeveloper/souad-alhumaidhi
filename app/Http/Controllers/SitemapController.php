<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Article;
use App\Models\Initiative;
use App\Models\MediaItem;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = collect([
            ['loc' => route('home'), 'priority' => '1.0'],
            ['loc' => route('biography'), 'priority' => '0.9'],
            ['loc' => route('achievements.index'), 'priority' => '0.8'],
            ['loc' => route('media.index'), 'priority' => '0.8'],
            ['loc' => route('gallery.index'), 'priority' => '0.7'],
            ['loc' => route('initiatives.index'), 'priority' => '0.7'],
            ['loc' => route('articles.index'), 'priority' => '0.7'],
            ['loc' => route('tributes.index'), 'priority' => '0.6'],
            ['loc' => route('contact'), 'priority' => '0.5'],
        ]);

        $urls = $urls
            ->concat(Achievement::published()->get()->map(fn ($a) => ['loc' => route('achievements.show', $a), 'priority' => '0.6']))
            ->concat(Initiative::published()->get()->map(fn ($i) => ['loc' => route('initiatives.show', $i), 'priority' => '0.6']))
            ->concat(MediaItem::published()->get()->map(fn ($m) => ['loc' => route('media.show', $m), 'priority' => '0.6']))
            ->concat(Article::published()->get()->map(fn ($a) => ['loc' => route('articles.show', $a), 'priority' => '0.6']));

        $xml = view('sitemap', compact('urls'))->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
