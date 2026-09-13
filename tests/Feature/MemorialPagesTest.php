<?php

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

it('renders the home page with the person name', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('سعاد الحميضي');
});

it('renders the biography page with sourced sections', function () {
    $response = $this->get(route('biography'));

    $response->assertOk();
    $response->assertSee('النشأة والعائلة');
});

it('renders the timeline page', function () {
    $response = $this->get(route('timeline'));

    $response->assertOk();
    $response->assertSee('1939');
});

it('renders the achievements page', function () {
    $response = $this->get(route('achievements'));

    $response->assertOk();
});

it('renders the media page even with no verified videos', function () {
    $response = $this->get(route('media'));

    $response->assertOk();
});

it('renders the gallery page even with no verified photos', function () {
    $response = $this->get(route('gallery'));

    $response->assertOk();
});

it('renders the initiatives page', function () {
    $response = $this->get(route('initiatives'));

    $response->assertOk();
});

it('renders the press page', function () {
    $response = $this->get(route('press'));

    $response->assertOk();
});

it('renders the sources page listing every documented source', function () {
    $response = $this->get(route('sources'));

    $response->assertOk();
    $response->assertSee('ويكيبيديا (النسخة العربية)');
    $response->assertSee('صحيفة عكاظ');
});

it('serves a valid sitemap', function () {
    $response = $this->get('/sitemap.xml');

    $response->assertOk();
    $response->assertSee('<urlset', false);
});
