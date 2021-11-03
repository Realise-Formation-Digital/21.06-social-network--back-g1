<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

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
            'ville' => $this->faker->word,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'date' => $this->faker->date(),
            ]; 
    }
}

