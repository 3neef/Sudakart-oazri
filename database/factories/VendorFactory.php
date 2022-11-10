<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Market;
use App\Models\Shop;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class VendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vendor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid'                          => $this->faker->uuid,
            'first_name'                    => $this->faker->firstName,
            'last_name'                     => $this->faker->lastName,
            "bank_name"                     => $this->faker->firstName,
            "account_number"                => $this->faker->iban,
            "account_holder_name"              => $this->faker->name,
            "branch"                        => $this->faker->name,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Vendor $vendor) {
            $user = $vendor->user()->create([
                'phone' => $this->faker->unique->e164PhoneNumber,
                'email' => $this->faker->unique->email,
                'password' => Hash::make('12345678')
            ]);

            $vendor->wallet()->create();

            Shop::create([
                'vendor_id' => $vendor->id,
                'city_id' => $this->faker->randomElement(City::all())->id,
                'market_id' => $this->faker->randomElement(Market::all())->id,
                'shop_name' => $this->faker->name,
                'shop_en_name' => $this->faker->name,
                'shop_address'  => $this->faker->address,
                'lat' => $this->faker->latitude,
                'long' => $this->faker->longitude,
            ]);
        });
    }
}
