<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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

        $employeeRole = Role::create(['name' => 'employee']);

        // $studentRole = Role::create(['name' => 'student']);

        // $teacherRole = Role::create(['name' => 'teacher']);

        $permissions = Permission::insert([
            [
                'name'       => 'medicine_and_health',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'health_and_beauty',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'pregnancy_and_birth',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'diseases',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'medicines',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'calories',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'checkups',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'vaccinations',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'videos',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'body_system',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'organs',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'pergnancy_stages',
                'guard_name' => 'web',
            ],


            [
                'name'       => 'ads',
                'guard_name' => 'web',
            ],

            [
                'name'       => 'faqs',
                'guard_name' => 'web',
            ],

            // contacts
            [
                'name'       => 'contacts',
                'guard_name' => 'web',
            ],


            // settings
            [
                'name'       => 'settings',
                'guard_name' => 'web',
            ],

        ]);

        $adminRole->givePermissionTo(Permission::all());
    }
}
