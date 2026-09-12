<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $items = Quote::orderBy('sort_order')->orderByDesc('id')->get();

        return view('admin.quotes.index', compact('items'));
    }

    public function create()
    {
        return view('admin.quotes.form', ['item' => new Quote]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('quotes', 'public');
        }
        Quote::create($data);

        return redirect()->route('admin.quotes.index')->with('status', 'تمت الإضافة بنجاح.');
    }

    public function edit(Quote $quote)
    {
        return view('admin.quotes.form', ['item' => $quote]);
    }

    public function update(Request $request, Quote $quote): RedirectResponse
    {
        $data = $this->validated($request);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('quotes', 'public');
        }
        $quote->update($data);

        return redirect()->route('admin.quotes.index')->with('status', 'تم التحديث بنجاح.');
    }

    public function destroy(Quote $quote): RedirectResponse
    {
        $quote->delete();

        return back()->with('status', 'تم الحذف.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'quote_text' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'attributed_to' => ['nullable', 'string', 'max:150'],
            'attributed_role' => ['nullable', 'string', 'max:150'],
            'type' => ['required', 'in:her_quote,testimonial,general'],
            'context' => ['nullable', 'string', 'max:255'],
            'source_name' => ['nullable', 'string', 'max:150'],
            'source_url' => ['nullable', 'url', 'max:255'],
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
}
