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
            'description' => $this->faker->paragraph(50),
            'image'       => "https://dummyimage.com/300/ffffff/000000",
            'author_id'     => \App\Models\User::factory(),
        ];
    }
}
