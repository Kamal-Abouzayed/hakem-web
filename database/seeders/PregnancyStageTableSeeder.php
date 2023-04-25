<?php

namespace Database\Seeders;

use App\Models\PregnancyStage;
use Illuminate\Database\Seeder;

class PregnancyStageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PregnancyStage::insert([
            [
                'id'         => 1,
                'name_ar'    => 'الحمل فى الثلث الأول',
                'name_en'    => 'Pregnancy in the first trimester',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => null,
                'slug'       => 'pregnancy-in-the-first-trimester',
                'img'        => 'pregnancy-stages/img-1.png'
            ],
            [
                'id'         => 2,
                'name_ar'    => 'الحمل فى الثلث الثانى',
                'name_en'    => 'Pregnancy in the second trimester',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => null,
                'slug'       => 'pregnancy-in-the-second-trimester',
                'img'        => 'pregnancy-stages/img-1.png'
            ],
            [
                'id'         => 3,
                'name_ar'    => 'الحمل فى الثلث الثالث',
                'name_en'    => 'Pregnancy in the third trimester',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => null,
                'slug'       => 'pregnancy-in-the-third-trimester',
                'img'        => 'pregnancy-stages/img-1.png'
            ],

            // Pregnancy in the first trimester months
            [
                'id'         => 4,
                'name_ar'    => 'الشهر الأول',
                'name_en'    => 'First Month',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => 1,
                'slug'       => 'first-month',
                'img'        => 'pregnancy-stages/img-1.png'
            ],
            [
                'id'         => 5,
                'name_ar'    => 'الشهر الثانى',
                'name_en'    => 'Second Month',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => 1,
                'slug'       => 'second-month',
                'img'        => 'pregnancy-stages/img-1.png'
            ],
            [
                'id'         => 6,
                'name_ar'    => 'الشهر الثالث',
                'name_en'    => 'Third Month',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => 1,
                'slug'       => 'third-month',
                'img'        => 'pregnancy-stages/img-1.png'
            ],

            // Pregnancy in the second trimester months
            [
                'id'         => 7,
                'name_ar'    => 'الشهر الرابع',
                'name_en'    => 'Fourth Month',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => 2,
                'slug'       => 'fourth-month',
                'img'        => 'pregnancy-stages/img-1.png'
            ],
            [
                'id'         => 8,
                'name_ar'    => 'الشهر الخامس',
                'name_en'    => 'Fifth Month',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => 2,
                'slug'       => 'fifth-month',
                'img'        => 'pregnancy-stages/img-1.png'
            ],
            [
                'id'         => 9,
                'name_ar'    => 'الشهر السادس',
                'name_en'    => 'Sixth Month',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => 2,
                'slug'       => 'sixth-month',
                'img'        => 'pregnancy-stages/img-1.png'
            ],

            // Pregnancy in the third trimester months
            [
                'id'         => 10,
                'name_ar'    => 'الشهر السابع',
                'name_en'    => 'Seventh Month',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => 3,
                'slug'       => 'seventh-month',
                'img'        => 'pregnancy-stages/img-1.png'
            ],
            [
                'id'         => 11,
                'name_ar'    => 'الشهر الثامن',
                'name_en'    => 'Eighth Month',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => 3,
                'slug'       => 'eighth-month',
                'img'        => 'pregnancy-stages/img-1.png'
            ],
            [
                'id'         => 12,
                'name_ar'    => 'الشهر التاسع',
                'name_en'    => 'Ninth Month',
                'desc_ar'    => 'في مكان واحد ، نوفر لك كل ما تحتاجه لدروسك في الثانوية والجامعة مع أفضل المعلمين. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
                'desc_en'    => 'In one place we provide you everything you need for your high school and university lessons with the best teachers. This text is an example of text that can be replaced in the same space This text is an example of text that can be replaced in the same space',
                'parent_id'  => 3,
                'slug'       => 'ninth-month',
                'img'        => 'pregnancy-stages/img-1.png'
            ],
        ]);
    }
}
