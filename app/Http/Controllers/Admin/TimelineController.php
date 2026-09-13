<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimelineEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $items = TimelineEvent::orderBy('sort_order')->orderBy('year')->get();

        return view('admin.timeline.index', compact('items'));
    }

    public function create()
    {
        return view('admin.timeline.form', ['item' => new TimelineEvent]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Support\Media::store($request->file('image'), 'timeline');
        }
        TimelineEvent::create($data);

        return redirect()->route('admin.timeline.index')->with('status', 'تمت الإضافة بنجاح.');
    }

    public function edit(TimelineEvent $timeline)
    {
        return view('admin.timeline.form', ['item' => $timeline]);
    }

    public function update(Request $request, TimelineEvent $timeline): RedirectResponse
    {
        $data = $this->validated($request);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Support\Media::store($request->file('image'), 'timeline');
        }
        $timeline->update($data);

        return redirect()->route('admin.timeline.index')->with('status', 'تم التحديث بنجاح.');
    }

    public function destroy(TimelineEvent $timeline): RedirectResponse
    {
        $timeline->delete();

        return back()->with('status', 'تم الحذف.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'year' => ['required', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:200'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:50'],
            'image' => ['nullable', 'image', 'max:4096'],
            'source_name' => ['nullable', 'string', 'max:150'],
            'source_url' => ['nullable', 'url', 'max:255'],
            'is_verified' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
        unset($data['image']);
        $data['is_verified'] = $request->boolean('is_verified');
        $data['icon'] = $data['icon'] ?: 'bi-flag';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
