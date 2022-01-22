<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Who;

class WhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $who=Who::query()
        ->create([
            'title' => 'من نحن',
            'desc' => 'مكتب محاماة واستشارات قانونية يضم فريق عمل مؤهل من الكوادر الأكاديمية والعلمية من ذوي الخبرة والاختصاص في كافة المجالات القانونية والشرعية والبحثية كالأنظمة التجارية والجزئية والتحكيم والمالية والعمالية والإحالة الشخصية وغيرها ، ولدينا أيضًا مجموعة عدد من المحامين والمستشارين المرخص لهم من داخل وخارج المملكة لضمان أعلى المعايير من الخدمات الاستشارية لعملائنا ، من خلال الخبرة الواسعة في إدارة الدعاوى والعقود وتمثيل العملاء أمام جميع أنواع المحاكم والهيئات واللجان ذات الاختصاص.'
            
        ]);
    }
}