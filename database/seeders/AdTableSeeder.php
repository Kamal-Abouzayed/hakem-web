<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Seeder;

class AdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ad::insert([
            [
                'desc_ar'     => 'اعلان',
                'desc_en'     => 'Advertisement',
                'btn_text_ar' => 'اضغط هنا',
                'btn_text_en' => 'Click Here',
                'link'        => 'https://google.com',
                'img'         => 'ads/img-1.png'
            ]
        ]);
    }
}
