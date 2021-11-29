<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'excerpt' => $this->faker->paragraph(),
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(4)) . '</p>',
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
