<?php

namespace Database\Seeders;

use App\Models\Initiative;
use App\Support\ArabicSlug;
use Illuminate\Database\Seeder;

class InitiativeSeeder extends Seeder
{
    public function run(): void
    {
        // No community/charitable initiative was found with a primary, fully-verifiable source at the time
        // of writing. Two plausible leads exist only as compressed, syndicated press snippets and are kept
        // here as drafts (unpublished) for admin review rather than published as confirmed facts.
        $items = [
            [
                'title' => 'ترميم جامع العمري في بيروت (مسودة - بحاجة إلى تحقق)',
                'icon' => 'bi-moon-stars',
                'summary' => 'أشارت مقالات صحفية مُجمّعة إلى قيامها بترميم جامع العمري في بيروت على نفقتها الخاصة.',
                'content' => 'لم يتم التحقق من هذه المعلومة من مصدرها الأساسي حتى الآن. أُبقيت كمسودة داخل لوحة الإدارة لحين المراجعة والتأكد قبل نشرها للزوار.',
                'category' => 'charity',
                'source_name' => 'مصادر صحفية مُجمّعة (يتطلب تحقق إضافي)',
                'source_url' => null,
                'is_verified' => false,
                'status' => 'draft',
                'sort_order' => 1,
            ],
            [
                'title' => 'مشاريعها الخيرية (مسودة - بحاجة إلى تحقق)',
                'icon' => 'bi-heart',
                'summary' => 'أشارت مصادر صحفية إلى تكريمها من قبل السيدة سوزان مبارك في مؤتمر لسيدات الأعمال العربيات تقديرًا لمشاريعها الخيرية.',
                'content' => 'التفاصيل الدقيقة لهذه المشاريع لم يتم تأكيدها من مصدر أساسي، وتحتاج مراجعة قبل النشر.',
                'category' => 'charity',
                'source_name' => 'مصادر صحفية مُجمّعة (يتطلب تحقق إضافي)',
                'source_url' => null,
                'is_verified' => false,
                'status' => 'draft',
                'sort_order' => 2,
            ],
        ];

        foreach ($items as $item) {
            Initiative::updateOrCreate(
                ['title' => $item['title']],
                $item + ['slug' => ArabicSlug::make($item['title'])]
            );
        }
    }
}
