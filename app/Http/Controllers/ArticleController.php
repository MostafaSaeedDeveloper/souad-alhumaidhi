<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()->ordered()->paginate(9);

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        abort_unless($article->status === 'published', 404);

        $related = Article::published()->where('id', '!=', $article->id)->ordered()->take(3)->get();

        return view('articles.show', compact('article', 'related'));
    }
}
