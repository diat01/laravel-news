<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(5),
            'image'       => $this->faker->imageUrl(640, 480, 'news', true),
            'user_id'     => \App\Models\User::factory(),
        ];
    }
}
