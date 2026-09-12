<?php

namespace App\Http\Controllers;

use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::published()->ordered()->paginate(9);
        $categories = Achievement::published()->pluck('category')->filter()->unique();

        return view('achievements.index', compact('achievements', 'categories'));
    }

    public function show(Achievement $achievement)
    {
        abort_unless($achievement->status === 'published', 404);

        $related = Achievement::published()
            ->where('id', '!=', $achievement->id)
            ->when($achievement->category, fn ($q) => $q->where('category', $achievement->category))
            ->ordered()->take(3)->get();

        return view('achievements.show', compact('achievement', 'related'));
    }
}
