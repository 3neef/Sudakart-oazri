<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::all();
        return [
            'uuid' => $this->faker->uuid,
            'name' => $this->faker->word,
            'en_name' => $this->faker->word,
            'commission' => rand(0.01, 0.4),
            'image' => '',
        ];
    }
}
