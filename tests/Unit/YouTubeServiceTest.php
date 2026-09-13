<?php

use App\Services\YouTubeService;

it('extracts the video id from a youtu.be url', function () {
    $service = new YouTubeService();

    expect($service->extractId('https://youtu.be/dQw4w9WgXcQ'))->toBe('dQw4w9WgXcQ');
});

it('extracts the video id from a watch url', function () {
    $service = new YouTubeService();

    expect($service->extractId('https://www.youtube.com/watch?v=dQw4w9WgXcQ&t=10s'))->toBe('dQw4w9WgXcQ');
});

it('extracts the video id from an embed url', function () {
    $service = new YouTubeService();

    expect($service->extractId('https://www.youtube.com/embed/dQw4w9WgXcQ'))->toBe('dQw4w9WgXcQ');
});

it('returns null for a non-youtube url', function () {
    $service = new YouTubeService();

    expect($service->extractId('https://example.com/video'))->toBeNull();
});

it('builds a privacy-friendly embed url', function () {
    $service = new YouTubeService();

    expect($service->embedUrl('dQw4w9WgXcQ'))->toBe('https://www.youtube-nocookie.com/embed/dQw4w9WgXcQ');
});
