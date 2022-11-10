<?php

namespace Database\Factories;

use App\Models\Offer;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{

    protected $model = Offer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'shop_id'=> Shop::all()->random()->id,
        'name' => $this->faker->name(),
        'en_name' => $this->faker->name(),
        'discount'=> 0,
        'expire_at' => $this->faker->dateTime()
        ];
    }
}
