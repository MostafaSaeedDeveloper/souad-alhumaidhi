<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biography;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BiographyController extends Controller
{
    public function edit()
    {
        $biography = Biography::firstOrNew();

        return view('admin.biography.edit', compact('biography'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:150'],
            'title' => ['nullable', 'string', 'max:180'],
            'birth_year' => ['nullable', 'string', 'max:20'],
            'death_year' => ['nullable', 'string', 'max:20'],
            'nationality' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'max:4096'],
            'intro' => ['nullable', 'string'],
            'early_life' => ['nullable', 'string'],
            'career' => ['nullable', 'string'],
            'contributions' => ['nullable', 'string'],
            'honors' => ['nullable', 'string'],
            'full_content' => ['nullable', 'string'],
            'source_name' => ['nullable', 'string', 'max:150'],
            'source_url' => ['nullable', 'url', 'max:255'],
            'is_verified' => ['sometimes', 'boolean'],
        ]);

        $data['is_verified'] = $request->boolean('is_verified');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('biography', 'uploads');
        }

        $biography = Biography::firstOrNew();
        $biography->fill($data)->save();

        return redirect()->route('admin.biography.edit')->with('status', 'تم حفظ السيرة الذاتية.');
    }
}
