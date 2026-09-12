<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Support\ArabicSlug;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $items = Achievement::orderBy('sort_order')->orderByDesc('id')->get();

        return view('admin.achievements.index', compact('items'));
    }

    public function create()
    {
        return view('admin.achievements.form', ['item' => new Achievement]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('achievements', 'uploads');
        }
        Achievement::create($data);

        return redirect()->route('admin.achievements.index')->with('status', 'تمت الإضافة بنجاح.');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.form', ['item' => $achievement]);
    }

    public function update(Request $request, Achievement $achievement): RedirectResponse
    {
        $data = $this->validated($request);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('achievements', 'uploads');
        }
        $achievement->update($data);

        return redirect()->route('admin.achievements.index')->with('status', 'تم التحديث بنجاح.');
    }

    public function destroy(Achievement $achievement): RedirectResponse
    {
        $achievement->delete();

        return back()->with('status', 'تم الحذف.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'category' => ['nullable', 'string', 'max:100'],
            'icon' => ['nullable', 'string', 'max:50'],
            'summary' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'year' => ['nullable', 'string', 'max:20'],
            'source_name' => ['nullable', 'string', 'max:150'],
            'source_url' => ['nullable', 'url', 'max:255'],
            'is_verified' => ['sometimes', 'boolean'],
            'is_featured' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
        $data['is_verified'] = $request->boolean('is_verified');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['icon'] = $data['icon'] ?: 'bi-award';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }

    private function uniqueSlug(string $title): string
    {
        $slug = ArabicSlug::make($title);
        $base = $slug;
        $i = 1;
        while (Achievement::where('slug', $slug)->exists()) {
            $slug = $base.'-'.(++$i);
        }

        return $slug;
    }
}
