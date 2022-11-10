<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatesSeeder::class,
            CitiesSeeder::class,
            MarketSeeder::class,
            VendorsSeeder::class,
            // CategoriesSeeder::class,
            // AttributesSeeder::class,
            // OptionsSeeder::class,
            // ProductsSeeder::class,
            // ProductOptionsSeeder::class,
            RoleAndPermissionSeeder::class,
        ]);
    }
}
