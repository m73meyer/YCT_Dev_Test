<?php

namespace Database\Factories;

use App\Utils\AppStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class NumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => Str::random(14),
            'status' => Arr::random(AppStatus::getNumberStatus())
        ];
    }
}
