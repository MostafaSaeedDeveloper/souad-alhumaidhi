<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::orderBy('sort_order')->orderByDesc('id')->get();

        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.form', ['item' => new GalleryItem]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request, true);
        $data['image'] = \App\Support\Media::store($request->file('image'), 'gallery');
        GalleryItem::create($data);

        return redirect()->route('admin.gallery.index')->with('status', 'تمت الإضافة بنجاح.');
    }

    public function bulkStore(Request $request): RedirectResponse
    {
        $request->validate([
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image', 'max:5120'],
        ]);

        $nextOrder = (int) GalleryItem::max('sort_order') + 1;

        foreach ($request->file('images') as $file) {
            GalleryItem::create([
                'alt' => 'صورة من معرض سعاد الحميضي',
                'image' => \App\Support\Media::store($file, 'gallery'),
                'category' => 'general',
                'is_verified' => false,
                'sort_order' => $nextOrder++,
                'status' => 'published',
            ]);
        }

        $count = count($request->file('images'));

        return redirect()->route('admin.gallery.index')->with('status', "تم رفع {$count} صورة بنجاح. يمكنك فتح أي صورة لإضافة التفاصيل لاحقًا.");
    }

    public function edit(GalleryItem $gallery)
    {
        return view('admin.gallery.form', ['item' => $gallery]);
    }

    public function update(Request $request, GalleryItem $gallery): RedirectResponse
    {
        $data = $this->validated($request, false);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Support\Media::store($request->file('image'), 'gallery');
        }
        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('status', 'تم التحديث بنجاح.');
    }

    public function destroy(GalleryItem $gallery): RedirectResponse
    {
        $gallery->delete();

        return back()->with('status', 'تم الحذف.');
    }

    private function validated(Request $request, bool $imageRequired): array
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:200'],
            'alt' => ['required', 'string', 'max:200'],
            'caption' => ['nullable', 'string', 'max:255'],
            'image' => [$imageRequired ? 'required' : 'nullable', 'image', 'max:5120'],
            'category' => ['nullable', 'string', 'max:100'],
            'source_name' => ['nullable', 'string', 'max:150'],
            'source_url' => ['nullable', 'url', 'max:255'],
            'copyright_note' => ['nullable', 'string', 'max:255'],
            'is_verified' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
        unset($data['image']);
        $data['is_verified'] = $request->boolean('is_verified');
        $data['category'] = $data['category'] ?: 'general';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
