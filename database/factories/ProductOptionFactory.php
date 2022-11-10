<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductOptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductOption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::all()->random()->id,
            'option_id' => Option::all()->random()->id,
            'quantity' => $this->faker->randomDigit(),
            'increment' => rand(1, 100)
        ];
    }
}
