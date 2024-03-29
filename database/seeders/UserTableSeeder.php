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
            'fname'             => 'ADMIN',
            'lname'             => 'ADMIN',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
    }   
}
