<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'id'         => 1,
                'name_ar'    => 'قسم رئيسى',
                'name_en'    => 'Main Category',
                'desc_ar'    => 'قسم رئيسى',
                'desc_en'    => 'Main Category',
                'parent_id'  => null,
                'section_id' => 1,
                'slug'       => 'main-category',
                'img'        => 'categories/img-1.png'
            ],
            [
                'id'         => 2,
                'name_ar'    => 'قسم فرعى',
                'name_en'    => 'Sub Category',
                'desc_ar'    => 'قسم فرعى',
                'desc_en'    => 'Sub Category',
                'parent_id'  => 1,
                'section_id' => 1,
                'slug'       => 'sub-category',
                'img'        => 'sub-categories/img-1.png'
            ],
        ]);
    }
}
