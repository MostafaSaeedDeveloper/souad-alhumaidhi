<?php

namespace App\Http\Controllers;

use App\Models\Tribute;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TributeController extends Controller
{
    public function index()
    {
        $tributes = Tribute::approved()->latest()->paginate(10);

        return view('tributes.index', compact('tributes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:150'],
            'city' => ['nullable', 'string', 'max:120'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
            'consent_to_publish' => ['accepted'],
        ], [
            'consent_to_publish.accepted' => 'يجب الموافقة على نشر الرسالة في الموقع.',
        ]);

        Tribute::create([
            'name' => $data['name'],
            'email' => $data['email'] ?? null,
            'city' => $data['city'] ?? null,
            'message' => $data['message'],
            'consent_to_publish' => true,
            'status' => 'pending',
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('tributes.index')
            ->with('status', 'شكرًا لك، تم استلام كلمة الوفاء وستظهر بعد مراجعتها.');
    }
}
