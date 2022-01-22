<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\lawer;
class lawerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lawer=Lawer::query()
        ->create([
            'title' => 'لماذا تختار محامينا',
            'desc' => 'يضم مكتبنا فريق عمل متميزًا بمؤهلات علمية وعملية ، بالإضافة إلى تنوع وتعدد خبرات فريق العمل ، حيث يضم فريق عمل متميزًا من المحامين والمستشارين القانونيين والقانونيين لخدمة ومتابعة أعمال واستشارات فريق العمل. عملاؤنا بالإضافة إلى أن صاحب المكتب لديه مجموعة',
            
        ]);
        $lawer->addMedia(public_path('img/s1.jpg'))->withResponsiveImages()->preservingOriginal()->toMediaCollection('lawer');
    }
}
