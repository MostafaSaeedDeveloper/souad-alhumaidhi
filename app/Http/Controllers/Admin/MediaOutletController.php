<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaOutlet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MediaOutletController extends Controller
{
    public function index()
    {
        $items = MediaOutlet::orderBy('sort_order')->get();

        return view('admin.outlets.index', compact('items'));
    }

    public function create()
    {
        return view('admin.outlets.form', ['item' => new MediaOutlet]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        if ($request->hasFile('logo')) {
            $data['logo'] = \App\Support\Media::store($request->file('logo'), 'outlets');
        }
        MediaOutlet::create($data);

        return redirect()->route('admin.outlets.index')->with('status', 'تمت الإضافة بنجاح.');
    }

    public function edit(MediaOutlet $outlet)
    {
        return view('admin.outlets.form', ['item' => $outlet]);
    }

    public function update(Request $request, MediaOutlet $outlet): RedirectResponse
    {
        $data = $this->validated($request);
        if ($request->hasFile('logo')) {
            $data['logo'] = \App\Support\Media::store($request->file('logo'), 'outlets');
        }
        $outlet->update($data);

        return redirect()->route('admin.outlets.index')->with('status', 'تم التحديث بنجاح.');
    }

    public function destroy(MediaOutlet $outlet): RedirectResponse
    {
        $outlet->delete();

        return back()->with('status', 'تم الحذف.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'country' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
        unset($data['logo']);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
