<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    private static $sequence = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => sprintf('部署%d', self::$sequence++),
            'manager_name' => $this->faker->name(),
        ];
    }
}
