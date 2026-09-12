<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Support\ArabicSlug;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $items = Article::orderByDesc('published_at')->orderByDesc('id')->get();

        return view('admin.articles.index', compact('items'));
    }

    public function create()
    {
        return view('admin.articles.form', ['item' => new Article]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Support\Media::store($request->file('image'), 'articles');
        }
        Article::create($data);

        return redirect()->route('admin.articles.index')->with('status', 'تمت الإضافة بنجاح.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.form', ['item' => $article]);
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $data = $this->validated($request);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Support\Media::store($request->file('image'), 'articles');
        }
        $article->update($data);

        return redirect()->route('admin.articles.index')->with('status', 'تم التحديث بنجاح.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return back()->with('status', 'تم الحذف.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:220'],
            'excerpt' => ['nullable', 'string', 'max:400'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'source_name' => ['nullable', 'string', 'max:150'],
            'source_url' => ['nullable', 'url', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'is_verified' => ['sometimes', 'boolean'],
            'is_featured' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
        unset($data['image']);
        $data['is_verified'] = $request->boolean('is_verified');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }

    private function uniqueSlug(string $title): string
    {
        $slug = ArabicSlug::make($title);
        $base = $slug;
        $i = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = $base.'-'.(++$i);
        }

        return $slug;
    }
}
