<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->unique()->sentence($nbWords = 4, $variableNbWords = true);
        return [
            'title' => $title,
            'body' => '<h4>' . $this->faker->sentence($nbWords = 4, $variableNbWords = true) . '</h4><img src="' . $this->faker->imageUrl($width = 640, $height = 480, 'nature') . '"><p>' . $this->faker->paragraph($nbSentences = 10, $variableNbSentences = true) . '</p>' ,
            'slug' => Str::slug($title),
            'active' => $this->faker->boolean($chanceOfGettingTrue = 70)
        ];
    }
}
