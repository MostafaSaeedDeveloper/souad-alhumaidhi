<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // Real, sourced testimonial
            [
                'quote_text' => 'خالص العزاء والمواساة لآل الحميضي الكرام بوفاة السيدة الفاضلة سعاد الحميضي إحدى رائدات قطاع الأعمال والاقتصاد بالكويت.',
                'attributed_to' => 'مرزوق الغانم',
                'attributed_role' => 'رئيس مجلس الأمة الكويتي (وقتها)',
                'type' => 'testimonial',
                'context' => 'بيان عزاء عقب وفاتها، أغسطس 2017',
                'source_name' => 'جريدة القبس',
                'source_url' => 'https://alqabas.com/article/422618',
                'is_verified' => true,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'quote_text' => 'سفيرة الخير',
                'attributed_to' => 'جريدة الأنباء الكويتية',
                'attributed_role' => 'من عنوان مقال نعي',
                'type' => 'testimonial',
                'context' => 'لقب أطلقته الصحيفة عليها في نعيها',
                'source_name' => 'جريدة الأنباء',
                'source_url' => null,
                'is_verified' => true,
                'is_featured' => false,
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'quote_text' => 'رائدة سيدات الأعمال الكويتيات',
                'attributed_to' => 'جريدة الجريدة',
                'attributed_role' => 'من عنوان مقال نعي',
                'type' => 'testimonial',
                'context' => 'لقب أطلقته الصحيفة عليها في نعيها',
                'source_name' => 'جريدة الجريدة',
                'source_url' => null,
                'is_verified' => true,
                'is_featured' => false,
                'status' => 'published',
                'sort_order' => 3,
            ],
            [
                'quote_text' => 'سفيرة سيدات الأعمال الكويتيات',
                'attributed_to' => 'جريدة الراي',
                'attributed_role' => 'من عنوان مقال نعي',
                'type' => 'testimonial',
                'context' => 'لقب أطلقته الصحيفة عليها في نعيها',
                'source_name' => 'جريدة الراي',
                'source_url' => 'https://www.alraimedia.com/article/765611',
                'is_verified' => true,
                'is_featured' => false,
                'status' => 'published',
                'sort_order' => 4,
            ],

            // Unverified candidate quote attributed to her directly — kept as draft pending confirmation
            [
                'quote_text' => 'أحب الأناقة منذ طفولتي.. وجلسات الضحى لا تجذبني.',
                'attributed_to' => 'سعاد الحميضي',
                'attributed_role' => null,
                'type' => 'her_quote',
                'context' => 'عنوان مقال/مقابلة صحفية — لم يتم تأكيد أن العبارة اقتباس حرفي منسوب لها بشكل مباشر داخل النص الكامل للمقال (تعذّر الوصول إلى نص المقال الأصلي للتحقق).',
                'source_name' => 'جريدة القبس (بحاجة إلى تحقق)',
                'source_url' => 'https://alqabas.com/article/48858/',
                'is_verified' => false,
                'is_featured' => false,
                'status' => 'draft',
                'sort_order' => 10,
            ],
        ];

        foreach ($items as $item) {
            Quote::updateOrCreate(
                ['quote_text' => $item['quote_text'], 'attributed_to' => $item['attributed_to']],
                $item
            );
        }
    }
}
