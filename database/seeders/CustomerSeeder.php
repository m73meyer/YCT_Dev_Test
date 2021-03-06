<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Number;
use App\Models\User;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory('user_id')
            ->count(10)
            ->has(Number::factory()->count(rand(1, 30)))
            ->for(User::first())
            ->create();
    }
}
