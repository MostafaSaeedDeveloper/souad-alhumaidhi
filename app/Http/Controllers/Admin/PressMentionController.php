<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaOutlet;
use App\Models\PressMention;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PressMentionController extends Controller
{
    public function index()
    {
        $items = PressMention::with('mediaOutlet')->orderByDesc('published_at')->get();

        return view('admin.press.index', compact('items'));
    }

    public function create()
    {
        $outlets = MediaOutlet::orderBy('name')->get();

        return view('admin.press.form', ['item' => new PressMention, 'outlets' => $outlets]);
    }

    public function store(Request $request): RedirectResponse
    {
        PressMention::create($this->validated($request));

        return redirect()->route('admin.press.index')->with('status', 'تمت الإضافة بنجاح.');
    }

    public function edit(PressMention $press)
    {
        $outlets = MediaOutlet::orderBy('name')->get();

        return view('admin.press.form', ['item' => $press, 'outlets' => $outlets]);
    }

    public function update(Request $request, PressMention $press): RedirectResponse
    {
        $press->update($this->validated($request));

        return redirect()->route('admin.press.index')->with('status', 'تم التحديث بنجاح.');
    }

    public function destroy(PressMention $press): RedirectResponse
    {
        $press->delete();

        return back()->with('status', 'تم الحذف.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'media_outlet_id' => ['required', 'exists:media_outlets,id'],
            'title' => ['required', 'string', 'max:220'],
            'url' => ['nullable', 'url', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
