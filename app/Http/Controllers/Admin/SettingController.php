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

    public function edit()
    {
        $settings = Setting::whereIn('key', array_keys(self::KEYS))->pluck('value', 'key');

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        foreach (self::KEYS as $key => $group) {
            if ($request->has($key)) {
                Setting::updateOrCreate(['key' => $key], [
                    'value' => $request->input($key),
                    'group' => $group,
                    'type' => 'text',
                ]);
            }
        }

        return redirect()->route('admin.settings.edit')->with('status', 'تم حفظ الإعدادات.');
    }
}
