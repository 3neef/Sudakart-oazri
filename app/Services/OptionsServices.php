<?php


namespace App\Services;


use App\Models\Option;

class OptionsServices
{
    public static function createOption ($attribute_id, $options) {
        foreach ($options as $option) {
            if (!Option::where('attribute_id', $attribute_id)->where('option', $option['option'])->first()) {
                Option::create(array_merge(['attribute_id' => $attribute_id], $option));
            }
        }
        return true;
    }

}
