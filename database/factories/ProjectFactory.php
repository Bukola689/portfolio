<?php

namespace Database\Factories;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'skill_id' => Skill::all()->random()->id,
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl($width = 140, $height=300),
            'project_url' => $this->faker->url()
        ];
    }
}
