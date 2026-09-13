<?php

namespace App\Support;

class ArabicSlug
{
    private const MAP = [
        'ا' => 'a', 'أ' => 'a', 'إ' => 'i', 'آ' => 'a', 'ب' => 'b', 'ت' => 't', 'ث' => 'th',
        'ج' => 'j', 'ح' => 'h', 'خ' => 'kh', 'د' => 'd', 'ذ' => 'dh', 'ر' => 'r', 'ز' => 'z',
        'س' => 's', 'ش' => 'sh', 'ص' => 's', 'ض' => 'd', 'ط' => 't', 'ظ' => 'z', 'ع' => 'a',
        'غ' => 'gh', 'ف' => 'f', 'ق' => 'q', 'ك' => 'k', 'ل' => 'l', 'م' => 'm', 'ن' => 'n',
        'ه' => 'h', 'و' => 'w', 'ي' => 'y', 'ى' => 'a', 'ة' => 'a', 'ء' => '', 'ئ' => 'e',
        'ؤ' => 'o', 'ٱ' => 'a',
    ];

    public static function make(string $text): string
    {
        $translit = strtr($text, self::MAP);
        $translit = preg_replace('/[\x{064B}-\x{0652}]/u', '', $translit); // strip diacritics
        $slug = \Illuminate\Support\Str::slug($translit);

        return $slug ?: \Illuminate\Support\Str::random(8);
    }
}
