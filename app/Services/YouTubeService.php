<?php

namespace App\Services;

class YouTubeService
{
    /**
     * Extract the video ID from a youtu.be, watch, or embed URL.
     */
    public function extractId(string $url): ?string
    {
        $patterns = [
            '#youtu\.be/([A-Za-z0-9_-]{6,})#',
            '#youtube\.com/watch\?v=([A-Za-z0-9_-]{6,})#',
            '#youtube\.com/embed/([A-Za-z0-9_-]{6,})#',
            '#youtube\.com/shorts/([A-Za-z0-9_-]{6,})#',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    public function thumbnailUrl(string $videoId, string $quality = 'hqdefault'): string
    {
        return "https://i.ytimg.com/vi/{$videoId}/{$quality}.jpg";
    }

    public function embedUrl(string $videoId): string
    {
        return "https://www.youtube-nocookie.com/embed/{$videoId}";
    }
}
