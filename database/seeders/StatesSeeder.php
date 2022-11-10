<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['name' => 'الشمالية', 'en_name' => 'Northern'],
            ['name' => 'نهر النيل', 'en_name' => 'River Nile'],
            ['name' => 'البحر الاحمر', 'en_name' => 'Red Sea'],
            ['name' => 'القضارف', 'en_name' => 'Gadaref'],
            ['name' => 'كسلا', 'en_name' => 'Kassala'],
            ['name' => 'الخرطوم', 'en_name' => 'Khartoum'],
            ['name' => 'الجزيرة', 'en_name' => 'Gezira'],
            ['name' => 'سنار', 'en_name' => 'Sennar'],
            ['name' => 'النيل الازرق', 'en_name' => 'Blue nile'],
            ['name' => 'النيل الابيض', 'en_name' => 'White Nile'],
            ['name' => 'شمال كردفان', 'en_name' => 'North Kordofan'],
            ['name' => 'جنوب كردفان', 'en_name' => 'South Kordofan'],
            ['name' => 'غرب كردفان', 'en_name' => 'West Kordofan'],
            ['name' => 'شمال دارفور', 'en_name' => 'North Darfur'],
            ['name' => 'وسط دارفور', 'en_name' => 'Central Darfur'],
            ['name' => 'شرق دارفور', 'en_name' => 'East Darfur'],
            ['name' => 'غرب دارفور', 'en_name' => 'West Darfur'],
            ['name' => 'جنوب دارفور', 'en_name' => 'South Darfur'],
        ];

        State::insert($states);
    }
}
