<?php

namespace Database\Seeders;

use App\Models\ProductOption;
use Illuminate\Database\Seeder;

class ProductOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductOption::factory()->count(10)->create();
    }
}
