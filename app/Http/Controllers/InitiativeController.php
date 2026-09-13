<?php

namespace App\Http\Controllers;

use App\Models\Initiative;

class InitiativeController extends Controller
{
    public function index()
    {
        $initiatives = Initiative::published()->ordered()->paginate(9);

        return view('initiatives.index', compact('initiatives'));
    }

    public function show(Initiative $initiative)
    {
        abort_unless($initiative->status === 'published', 404);

        $related = Initiative::published()->where('id', '!=', $initiative->id)->ordered()->take(3)->get();

        return view('initiatives.show', compact('initiative', 'related'));
    }
}
