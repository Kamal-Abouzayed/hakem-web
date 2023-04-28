<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(PermissionTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(MailListSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(AdTableSeeder::class);
        $this->call(BodySystemTableSeeder::class);
        $this->call(PregnancyStageTableSeeder::class);
    }
}
