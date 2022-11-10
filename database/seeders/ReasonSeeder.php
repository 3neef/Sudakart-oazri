<?php

namespace Database\Seeders;

use App\Models\Reason;
use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reasons = [
            ['name' => 'تم الشراء بالخطأ', 'en_name' => 'Purchased by mistake'],
            ['name' => 'المنتج مكسور او تالف او به مشاكل', 'en_name' => 'The product is broken, damaged or has problems'],
            ['name' => 'المنتج مختلف عن الوصف', 'en_name' => 'The product is different from the description'],
            ['name' => 'تم ايجاد سعر افضل من المعروض', 'en_name' => 'A better price has been found'],
            ['name' => 'تم ايصال المنتج متأخر جدا', 'en_name' => 'The product was delivered too late'],
            ['name' => 'بعض اجزاء المنتج تالفة او مفقودة', 'en_name' => 'Some parts of the product are damaged or missing'],
            ['name' => 'المنتج لا يعمل', 'en_name' => 'The product does not work'],
        ];

        Reason::insert($reasons);
    }
}
