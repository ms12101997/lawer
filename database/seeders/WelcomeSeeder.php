<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Welcome;

class WelcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $welcome=Welcome::query()
        ->create([
            'title' => 'مرحبا بكم',
            'desc' => 'مكتب محاماة واستشارات قانونية يضم فريق عمل مؤهل من الكوادر الأكاديمية والعلمية من ذوي الخبرة والاختصاص في كافة المجالات القانونية والشرعية والبحثية كالأنظمة التجارية والجزئية والتحكيم والمالية والعمالية والإحالة الشخصية وغيرها ، ولدينا أيضًا مجموعة عدد من المحامين والمستشارين المرخص لهم من داخل وخارج المملكة لضمان أعلى المعايير من الخدمات الاستشارية لعملائنا ، من خلال الخبرة الواسعة في إدارة الدعاوى والعقود وتمثيل العملاء أمام جميع أنواع المحاكم والهيئات واللجان ذات الاختصاص.'
            
        ]);
        $welcome->addMedia(public_path('img\a1.jpg'))->preservingOriginal()->toMediaCollection('welcome');
    }
}
