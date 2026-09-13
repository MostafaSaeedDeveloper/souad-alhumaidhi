<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InitiativeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TributeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/biography', [BiographyController::class, 'show'])->name('biography');

Route::get('/achievements', [AchievementController::class, 'index'])->name('achievements.index');
Route::get('/achievements/{achievement}', [AchievementController::class, 'show'])->name('achievements.show');

Route::get('/media', [MediaController::class, 'index'])->name('media.index');
Route::get('/media/{media}', [MediaController::class, 'show'])->name('media.show');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/initiatives', [InitiativeController::class, 'index'])->name('initiatives.index');
Route::get('/initiatives/{initiative}', [InitiativeController::class, 'show'])->name('initiatives.show');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/tributes', [TributeController::class, 'index'])->name('tributes.index');
Route::post('/tributes', [TributeController::class, 'store'])->name('tributes.store')
    ->middleware('throttle:5,1');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store')
    ->middleware('throttle:5,1');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// ------------------------------------------------------------------
// Admin
// ------------------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [Admin\AuthController::class, 'login'])->name('login.attempt')
        ->middleware('throttle:10,1');
    Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::get('biography', [Admin\BiographyController::class, 'edit'])->name('biography.edit');
        Route::put('biography', [Admin\BiographyController::class, 'update'])->name('biography.update');

        Route::resource('timeline', Admin\TimelineController::class)->except(['show']);
        Route::resource('achievements', Admin\AchievementController::class)->except(['show']);
        Route::resource('media', Admin\MediaController::class)->except(['show']);
        Route::resource('gallery', Admin\GalleryController::class)->except(['show']);
        Route::post('gallery-bulk', [Admin\GalleryController::class, 'bulkStore'])->name('gallery.bulk-store');
        Route::resource('initiatives', Admin\InitiativeController::class)->except(['show']);
        Route::resource('articles', Admin\ArticleController::class)->except(['show']);
        Route::resource('quotes', Admin\QuoteController::class)->except(['show']);
        Route::resource('outlets', Admin\MediaOutletController::class)->except(['show']);
        Route::resource('press', Admin\PressMentionController::class)->except(['show']);

        Route::get('tributes', [Admin\TributeController::class, 'index'])->name('tributes.index');
        Route::put('tributes/{tribute}', [Admin\TributeController::class, 'update'])->name('tributes.update');
        Route::delete('tributes/{tribute}', [Admin\TributeController::class, 'destroy'])->name('tributes.destroy');

        Route::get('contact-messages', [Admin\ContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::put('contact-messages/{contactMessage}', [Admin\ContactMessageController::class, 'update'])->name('contact-messages.update');
        Route::delete('contact-messages/{contactMessage}', [Admin\ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

        Route::get('settings', [Admin\SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [Admin\SettingController::class, 'update'])->name('settings.update');
    });
});
