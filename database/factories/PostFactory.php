<?php

namespace Database\Factories;

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
            'ville'=>$this->faker->city,
            'description'=>$this->faker->sentence,
            'image'=>$this->faker->image,
            'date'=>$this->faker->date,
        ];
    }
}
