<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        ContactMessage::create([...$data, 'ip_address' => $request->ip()]);

        return redirect()->route('contact')->with('status', 'تم إرسال رسالتك بنجاح، سنتواصل معك في أقرب وقت.');
    }
}
