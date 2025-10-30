<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeminarFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(3),
            'date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'zoom_link' => $this->faker->url(),
            'image' => null,
        ];
    }
}