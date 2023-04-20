<?php

namespace Database\Seeders;

use App\Models\MailList;
use Illuminate\Database\Seeder;

class MailListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailList::factory()->count(10)->create();
    }
}
