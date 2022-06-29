<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>  $this->faker->randomElement(User::pluck('id')),
            'title'=> $this->faker->sentence(),
            'post_image'=> $this->faker->imageUrl('900','300'),
            'body' => $this->faker->paragraph()
           
        ]; }
}
