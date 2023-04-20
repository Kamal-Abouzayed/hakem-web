<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'phone' => '0123466789',
            'password' => bcrypt('password'),
            'isAdmin' => 1,
        ]);

        $admin->assignRole('admin');

        // Students

        // $students = User::factory()->count(10)->student()->create();

        // foreach ($students as $key => $student) {
        //     $student->assignRole('student');
        // }


        // // Teachers

        // $teachers = User::factory()->count(10)->teacher()->create();

        // foreach ($teachers as $key => $teacher) {
        //     $teacher->assignRole('teacher');
        // }
    }
}
