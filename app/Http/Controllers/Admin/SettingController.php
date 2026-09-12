<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public const KEYS = [
        'hero_title' => 'general',
        'hero_tagline' => 'general',
        'hero_description' => 'general',
        'hero_quote' => 'general',
        'hero_object_position' => 'hero',
        'homepage_quote' => 'general',
        'cta_primary_text' => 'general',
        'cta_secondary_text' => 'general',
        'footer_text' => 'footer',
        'site_meta_title' => 'seo',
        'site_meta_description' => 'seo',
        'social_youtube' => 'social',
        'social_twitter' => 'social',
        'social_instagram' => 'social',
        'social_linkedin' => 'social',
        'contact_email' => 'general',
    ];

    public const IMAGE_KEYS = [
        'hero_portrait_image' => 'hero-portrait',
        'hero_bg_image' => 'hero-bg',
        'legacy_banner_image' => 'legacy-banner',
    ];

    public function edit()
    {
        $allKeys = array_merge(array_keys(self::KEYS), array_keys(self::IMAGE_KEYS));
        $settings = Setting::whereIn('key', $allKeys)->pluck('value', 'key');

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'hero_portrait_image' => ['nullable', 'image', 'max:6144'],
            'hero_bg_image' => ['nullable', 'image', 'max:8192'],
            'legacy_banner_image' => ['nullable', 'image', 'max:8192'],
        ]);

        foreach (self::KEYS as $key => $group) {
            if ($request->has($key)) {
                Setting::updateOrCreate(['key' => $key], [
                    'value' => $request->input($key),
                    'group' => $group,
                    'type' => 'text',
                ]);
            }
        }

        foreach (self::IMAGE_KEYS as $key => $filenamePrefix) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->storeAs('', $filenamePrefix.'.'.$file->extension(), 'uploads');
                Setting::updateOrCreate(['key' => $key], [
                    'value' => $path,
                    'group' => 'hero',
                    'type' => 'image',
                ]);
            }
        }

        return redirect()->route('admin.settings.edit')->with('status', 'تم حفظ الإعدادات.');
    }
}
