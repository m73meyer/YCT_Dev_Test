<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Number;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->state(['email' => 'admin@admin.com'])->create();
    }
}
