<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $items = ContactMessage::latest()->paginate(20);

        return view('admin.contact-messages.index', compact('items'));
    }

    public function update(Request $request, ContactMessage $contactMessage): RedirectResponse
    {
        $data = $request->validate(['status' => ['required', 'in:new,read,replied']]);
        $contactMessage->update($data);

        return back()->with('status', 'تم التحديث.');
    }

    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();

        return back()->with('status', 'تم الحذف.');
    }
}
