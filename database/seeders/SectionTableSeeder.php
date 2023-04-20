<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::insert([
            [
                'name_ar' => 'الطب والصحة',
                'name_en' => 'Medicine and health',
                'img' => 'sections/img-1.png'
            ],
            [
                'name_ar' => 'الصحة والجمال',
                'name_en' => 'Health and beauty',
                'img' => 'sections/img-1.png'
            ],
            [
                'name_ar' => 'الحمل والولادة',
                'name_en' => 'Pregnancy and Birth',
                'img' => 'sections/img-1.png'
            ],
            [
                'name_ar' => 'الأمراض',
                'name_en' => 'Diseases',
                'img' => 'sections/img-1.png'
            ],
            [
                'name_ar' => 'السعرات الحرارية',
                'name_en' => 'Calories',
                'img' => 'sections/img-1.png'
            ],
        ]);
    }
}
