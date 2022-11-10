<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Market;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Market::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_id' => $this->faker->randomElement(City::all())->id,
            'name' => $this->faker->word,
            'en_name' => $this->faker->word,
            'lat' => $this->faker->latitude,
            'long' => $this->faker->longitude,
        ];
    }
}
