<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Article;
use App\Models\Biography;
use App\Models\Initiative;
use App\Models\MediaItem;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q'));
        $results = collect();

        if ($q !== '') {
            $like = '%'.$q.'%';

            $results = $results
                ->concat(Achievement::published()->where('title', 'like', $like)->orWhere('summary', 'like', $like)
                    ->get()->map(fn ($i) => ['type' => 'إنجاز', 'title' => $i->title, 'summary' => $i->summary, 'url' => route('achievements.show', $i)]))
                ->concat(Initiative::published()->where('title', 'like', $like)->orWhere('summary', 'like', $like)
                    ->get()->map(fn ($i) => ['type' => 'مبادرة', 'title' => $i->title, 'summary' => $i->summary, 'url' => route('initiatives.show', $i)]))
                ->concat(MediaItem::published()->where('title', 'like', $like)->orWhere('description', 'like', $like)
                    ->get()->map(fn ($i) => ['type' => 'لقاء إعلامي', 'title' => $i->title, 'summary' => $i->description, 'url' => route('media.show', $i)]))
                ->concat(Article::published()->where('title', 'like', $like)->orWhere('excerpt', 'like', $like)
                    ->get()->map(fn ($i) => ['type' => 'مقال', 'title' => $i->title, 'summary' => $i->excerpt, 'url' => route('articles.show', $i)]));

            $biography = Biography::first();
            if ($biography && (str_contains($biography->intro ?? '', $q) || str_contains($biography->full_content ?? '', $q))) {
                $results->push(['type' => 'السيرة الذاتية', 'title' => $biography->full_name, 'summary' => $biography->intro, 'url' => route('biography')]);
            }
        }

        return view('search', ['q' => $q, 'results' => $results]);
    }
}
