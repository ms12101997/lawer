<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Social;
class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $social=Social::query()
        ->create([
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.facebook.com',
            'snapchat' => 'https://www.facebook.com',
            'linkedin' => 'https://www.facebook.com',
            'whatsapp' => '01555378238'
            
        ]);
        $social->addMedia(public_path('img\main-logo.png'))->withResponsiveImages()->preservingOriginal()->toMediaCollection('logo');
    }
}
