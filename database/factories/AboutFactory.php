<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'about_title'  => $this->faker->sentence(),
            'about_desc'  => $this->faker->paragraph(3),
        ];
    }
}
