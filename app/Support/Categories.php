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

    private const MEDIA_LABELS = [
        'interview' => 'لقاءات تلفزيونية',
        'conference' => 'مؤتمرات',
        'dialogue' => 'حوارات',
        'report' => 'تقارير',
        'news' => 'أخبار',
    ];

    public static function label(?string $key): string
    {
        return self::LABELS[$key] ?? ($key ?? '');
    }

    public static function all(): array
    {
        return self::LABELS;
    }

    public static function mediaLabel(?string $key): string
    {
        return self::MEDIA_LABELS[$key] ?? ($key ?? '');
    }

    public static function mediaAll(): array
    {
        return self::MEDIA_LABELS;
    }
}
