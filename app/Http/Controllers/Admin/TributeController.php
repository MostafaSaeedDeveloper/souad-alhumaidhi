<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tribute;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TributeController extends Controller
{
    public function index()
    {
        $items = Tribute::latest()->paginate(20);

        return view('admin.tributes.index', compact('items'));
    }

    public function update(Request $request, Tribute $tribute): RedirectResponse
    {
        $data = $request->validate(['status' => ['required', 'in:pending,approved,rejected']]);
        $tribute->update($data);

        return back()->with('status', 'تم تحديث حالة الرسالة.');
    }

    public function destroy(Tribute $tribute): RedirectResponse
    {
        $tribute->delete();

        return back()->with('status', 'تم الحذف.');
    }
}
