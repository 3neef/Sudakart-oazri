<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Option::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attribute_id' => Attribute::all()->random()->id,
            'option' => $this->faker->unique()->word(),
            'en_option' => $this->faker->unique()->word(),
        ];
    }
}
