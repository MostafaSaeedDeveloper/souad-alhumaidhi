<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use App\Support\ArabicSlug;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InitiativeController extends Controller
{
    public function index()
    {
        $items = Initiative::orderBy('sort_order')->orderByDesc('id')->get();

        return view('admin.initiatives.index', compact('items'));
    }

    public function create()
    {
        return view('admin.initiatives.form', ['item' => new Initiative]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('initiatives', 'uploads');
        }
        Initiative::create($data);

        return redirect()->route('admin.initiatives.index')->with('status', 'تمت الإضافة بنجاح.');
    }

    public function edit(Initiative $initiative)
    {
        return view('admin.initiatives.form', ['item' => $initiative]);
    }

    public function update(Request $request, Initiative $initiative): RedirectResponse
    {
        $data = $this->validated($request);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('initiatives', 'uploads');
        }
        $initiative->update($data);

        return redirect()->route('admin.initiatives.index')->with('status', 'تم التحديث بنجاح.');
    }

    public function destroy(Initiative $initiative): RedirectResponse
    {
        $initiative->delete();

        return back()->with('status', 'تم الحذف.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'icon' => ['nullable', 'string', 'max:50'],
            'summary' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'category' => ['nullable', 'string', 'max:100'],
            'source_name' => ['nullable', 'string', 'max:150'],
            'source_url' => ['nullable', 'url', 'max:255'],
            'is_verified' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
        unset($data['image']);
        $data['is_verified'] = $request->boolean('is_verified');
        $data['icon'] = $data['icon'] ?: 'bi-heart';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }

    private function uniqueSlug(string $title): string
    {
        $slug = ArabicSlug::make($title);
        $base = $slug;
        $i = 1;
        while (Initiative::where('slug', $slug)->exists()) {
            $slug = $base.'-'.(++$i);
        }

        return $slug;
    }
}
