<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/biography', [PageController::class, 'biography'])->name('biography');
Route::get('/timeline', [PageController::class, 'timeline'])->name('timeline');
Route::get('/achievements', [PageController::class, 'achievements'])->name('achievements');
Route::get('/media', [PageController::class, 'media'])->name('media');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/initiatives', [PageController::class, 'initiatives'])->name('initiatives');
Route::get('/press', [PageController::class, 'press'])->name('press');
Route::get('/sources', [PageController::class, 'sources'])->name('sources');

Route::get('/sitemap.xml', function () {
    $pages = ['home', 'biography', 'timeline', 'achievements', 'media', 'gallery', 'initiatives', 'press', 'sources'];

    $urls = collect($pages)->map(fn ($name) => route($name));

    return response()
        ->view('sitemap', ['urls' => $urls])
        ->header('Content-Type', 'text/xml');
})->name('sitemap');
