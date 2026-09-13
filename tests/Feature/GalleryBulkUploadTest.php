<?php

use App\Models\GalleryItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

uses(RefreshDatabase::class);

test('admin can bulk upload multiple gallery images without filling details', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    $response = $this->actingAs($admin)->post(route('admin.gallery.bulk-store'), [
        'images' => [
            UploadedFile::fake()->image('one.jpg'),
            UploadedFile::fake()->image('two.jpg'),
            UploadedFile::fake()->image('three.jpg'),
        ],
    ]);

    $response->assertRedirect(route('admin.gallery.index'));
    expect(GalleryItem::count())->toBe(3);
    expect(GalleryItem::where('status', 'published')->count())->toBe(3);
    GalleryItem::all()->each(fn ($item) => expect($item->alt)->not->toBeEmpty());
});
