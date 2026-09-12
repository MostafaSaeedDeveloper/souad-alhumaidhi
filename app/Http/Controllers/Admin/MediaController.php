<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaItem;
use App\Support\ArabicSlug;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $items = MediaItem::orderBy('sort_order')->orderByDesc('published_at')->get();

        return view('admin.media.index', compact('items'));
    }

    public function create()
    {
        return view('admin.media.form', ['item' => new MediaItem]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        MediaItem::create($data);

        return redirect()->route('admin.media.index')->with('status', 'تمت الإضافة بنجاح.');
    }

    public function edit(MediaItem $medium)
    {
        return view('admin.media.form', ['item' => $medium]);
    }

    public function update(Request $request, MediaItem $medium): RedirectResponse
    {
        $medium->update($this->validated($request));

        return redirect()->route('admin.media.index')->with('status', 'تم التحديث بنجاح.');
    }

    public function destroy(MediaItem $medium): RedirectResponse
    {
        $medium->delete();

        return back()->with('status', 'تم الحذف.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'description' => ['nullable', 'string'],
            'youtube_url' => ['nullable', 'url', 'max:255'],
            'channel_name' => ['nullable', 'string', 'max:150'],
            'published_at' => ['nullable', 'date'],
            'source_name' => ['nullable', 'string', 'max:150'],
            'source_url' => ['nullable', 'url', 'max:255'],
            'is_verified' => ['sometimes', 'boolean'],
            'is_featured' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $data['is_verified'] = $request->boolean('is_verified');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if (! empty($data['youtube_url'])) {
            $data['youtube_id'] = $this->extractYoutubeId($data['youtube_url']);
            $data['thumbnail'] = $data['youtube_id']
                ? "https://img.youtube.com/vi/{$data['youtube_id']}/hqdefault.jpg"
                : null;
        }

        return $data;
    }

    private function extractYoutubeId(string $url): ?string
    {
        if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([A-Za-z0-9_-]{6,15})/', $url, $m)) {
            return $m[1];
        }

        return null;
    }

    private function uniqueSlug(string $title): string
    {
        $slug = ArabicSlug::make($title);
        $base = $slug;
        $i = 1;
        while (MediaItem::where('slug', $slug)->exists()) {
            $slug = $base.'-'.(++$i);
        }

        return $slug;
    }
}
