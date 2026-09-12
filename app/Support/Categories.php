<?php

namespace App\Support;

class Categories
{
    private const LABELS = [
        'entrepreneurship' => 'ريادة الأعمال',
        'women_empowerment' => 'تمكين المرأة',
        'community' => 'العمل المجتمعي',
        'humanitarian' => 'المبادرات الإنسانية',
        'investment' => 'الاستثمار',
        'economic_development' => 'التطوير الاقتصادي',
        'honors' => 'التكريمات',
        'charity' => 'المساهمات الخيرية',
        'community_service' => 'خدمة المجتمع',
        'youth_support' => 'دعم الشباب',
        'community_development' => 'التنمية المجتمعية',
    ];

    public static function label(?string $key): string
    {
        return self::LABELS[$key] ?? ($key ?? '');
    }

    public static function all(): array
    {
        return self::LABELS;
    }
}
