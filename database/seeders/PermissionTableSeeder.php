<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);

        // $studentRole = Role::create(['name' => 'student']);

        // $teacherRole = Role::create(['name' => 'teacher']);
    }
}
