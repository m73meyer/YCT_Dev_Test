<?php

namespace Database\Factories;

use App\Utils\AppStatus;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'name'      => $this->faker->name(),
            'document'  => Str::random(12),
            'status'    => Arr::random(AppStatus::getCustomerStatus()),
            'user_id'   => '',
        ];
    }
    
}
