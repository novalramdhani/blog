<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 8),
            'title' => $this->faker->sentence(),
            'slug' => Str::slug($this->faker->sentence() . '-' . Str::random(10)),
            'content' => $this->faker->paragraph(40)
        ];
    }
}
