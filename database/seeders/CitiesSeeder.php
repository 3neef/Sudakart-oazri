<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = State::where('name', 'الشمالية')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'وادي حلفا', 'en_name' => 'Wadi Halfa'],
            ['state_id' => $state->id, 'name' => 'دنقلا', 'en_name' => 'Dongola'],
            ['state_id' => $state->id, 'name' => 'القولد', 'en_name' => 'Al Goled'],
            ['state_id' => $state->id, 'name' => 'كرمة', 'en_name' => 'Kerma'],
            ['state_id' => $state->id, 'name' => 'البرقيق', 'en_name' => 'albarqiq'],
            ['state_id' => $state->id, 'name' => 'مروي', 'en_name' => 'Merowe'],
            ['state_id' => $state->id, 'name' => 'الدبة', 'en_name' => 'Al Dabbah'],
        ];
        City::insert($cities);

        $state = State::where('name', 'نهر النيل')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'الدامر', 'en_name' => 'Ad-Dāmar'],
            ['state_id' => $state->id, 'name' => 'عطبرة', 'en_name' => 'Atbara'],
            ['state_id' => $state->id, 'name' => 'ابوحمد', 'en_name' => 'Abu Hamad'],
            ['state_id' => $state->id, 'name' => 'شندي', 'en_name' => 'Shendi'],
            ['state_id' => $state->id, 'name' => 'المتمة', 'en_name' => 'El Matamma'],
            ['state_id' => $state->id, 'name' => 'البحيرة', 'en_name' => 'El Buhaira'],
            ['state_id' => $state->id, 'name' => 'بربر', 'en_name' => 'Berber'],
        ];
        City::insert($cities);

        $state = State::where('name', 'البحر الاحمر')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'بورتسودان', 'en_name' => 'Port Sudan'],
            ['state_id' => $state->id, 'name' => 'سنكات', 'en_name' => 'Sinkat'],
            ['state_id' => $state->id, 'name' => 'طوكر', 'en_name' => 'Tokar'],
            ['state_id' => $state->id, 'name' => 'حلايب', 'en_name' => 'Halaib'],
            ['state_id' => $state->id, 'name' => 'سواكن', 'en_name' => 'Sawakin'],
            ['state_id' => $state->id, 'name' => 'عقيق', 'en_name' => 'Ageeg'],
            ['state_id' => $state->id, 'name' => 'القنب والاوليبد', 'en_name' => 'Gunob Awlieb'],
            ['state_id' => $state->id, 'name' => 'هيا', 'en_name' => 'Haya'],
            ['state_id' => $state->id, 'name' => 'درديب', 'en_name' => 'Derodieb'],
            ['state_id' => $state->id, 'name' => 'جيبيت', 'en_name' => 'Gebiet'],
        ];
        City::insert($cities);

        $state = State::where('name', 'القضارف')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'القضارف', 'en_name' => 'El-Gadarif'],
            ['state_id' => $state->id, 'name' => 'ريفي القضارف', 'en_name' => 'Refi Al Gadarif'],
            ['state_id' => $state->id, 'name' => 'البطانة', 'en_name' => 'Albutana'],
            ['state_id' => $state->id, 'name' => 'الفاو', 'en_name' => 'Fao'],
            ['state_id' => $state->id, 'name' => 'الفشقة', 'en_name' => 'Al Fushqa'],
            ['state_id' => $state->id, 'name' => 'باسندة', 'en_name' => 'Basonda'],
            ['state_id' => $state->id, 'name' => 'القلابات الغربية', 'en_name' => 'Western Gallabat'],
            ['state_id' => $state->id, 'name' => 'القلابات الشرقية', 'en_name' => 'Eastern Gallabat'],
            ['state_id' => $state->id, 'name' => 'قلع النحل', 'en_name' => 'Gala-elnahal'],
            ['state_id' => $state->id, 'name' => 'القريشة', 'en_name' => 'Elgorisha'],
            ['state_id' => $state->id, 'name' => 'المفازة', 'en_name' => 'Al Mafaza'],
            ['state_id' => $state->id, 'name' => 'الرهد', 'en_name' => 'Er Rahad'],
        ];
        City::insert($cities);

        $state = State::where('name', 'كسلا')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'كسلا', 'en_name' => 'Kassala'],
            ['state_id' => $state->id, 'name' => 'نهر عطيرة', 'en_name' => 'Atbarah River'],
            ['state_id' => $state->id, 'name' => 'تلكوك', 'en_name' => 'Telkuk'],
            ['state_id' => $state->id, 'name' => 'همشكوريب', 'en_name' => 'Hamashkoraib'],
            ['state_id' => $state->id, 'name' => 'خشم القربة', 'en_name' => 'Khashm el Girba'],
            ['state_id' => $state->id, 'name' => 'ريفي كسلا', 'en_name' => 'Reifi Kassala'],
            ['state_id' => $state->id, 'name' => 'حلفا الجديدة', 'en_name' => 'Halfa el Jadida'],
            ['state_id' => $state->id, 'name' => 'غرب كسلا', 'en_name' => 'West Kassala'],
            ['state_id' => $state->id, 'name' => 'ود الحليو', 'en_name' => 'Wad al Hulaywah'],
            ['state_id' => $state->id, 'name' => 'شمال الدلتا', 'en_name' => 'Shamal Ad Delta'],
            ['state_id' => $state->id, 'name' => 'جنوب الدلتا', 'en_name' => 'Janoub Ad Delta'],
        ];
        City::insert($cities);

        $state = State::where('name', 'الخرطوم')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'الخرطوم', 'en_name' => 'Khartoum'],
            ['state_id' => $state->id, 'name' => 'الخرطوم بحري', 'en_name' => 'Bahri'],
            ['state_id' => $state->id, 'name' => 'امدرمان', 'en_name' => 'Omdurman'],
            ['state_id' => $state->id, 'name' => 'شرق النيل', 'en_name' => 'East Nile'],
            ['state_id' => $state->id, 'name' => 'امبدة', 'en_name' => 'Ombada'],
            ['state_id' => $state->id, 'name' => 'كرري', 'en_name' => 'Karary'],
            ['state_id' => $state->id, 'name' => 'جبل اولياء', 'en_name' => 'Jebel Aulia'],
        ];
        City::insert($cities);

        $state = State::where('name', 'الجزيرة')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'ودمدني', 'en_name' => 'Wad Madani'],
            ['state_id' => $state->id, 'name' => 'جنوب الجزيرة', 'en_name' => 'Southern Al-Jazeera'],
            ['state_id' => $state->id, 'name' => 'شرق الجزيرة', 'en_name' => 'Eastern Al-Jazeera'],
            ['state_id' => $state->id, 'name' => 'الحصاحيصا', 'en_name' => 'Al-Hasahisa'],
            ['state_id' => $state->id, 'name' => 'الكاملين', 'en_name' => 'Al-Kamlin'],
            ['state_id' => $state->id, 'name' => 'المناقل', 'en_name' => 'Al-Managel'],
            ['state_id' => $state->id, 'name' => 'القرشي', 'en_name' => 'Al-Qurashi'],
            ['state_id' => $state->id, 'name' => 'أم القرى', 'en_name' => 'Om Al-Qura'],
        ];
        City::insert($cities);

        $state = State::where('name', 'سنار')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'سنجة', 'en_name' => 'Sinjah'],
            ['state_id' => $state->id, 'name' => 'سنار', 'en_name' => 'Sennar'],
            ['state_id' => $state->id, 'name' => 'الدالي والمزموم', 'en_name' => 'Aldali & Almazmom'],
            ['state_id' => $state->id, 'name' => 'السوكي', 'en_name' => 'El Suki'],
            ['state_id' => $state->id, 'name' => 'شرق سنار', 'en_name' => 'East Sennar'],
            ['state_id' => $state->id, 'name' => 'الدندر', 'en_name' => 'Al Dinder'],
            ['state_id' => $state->id, 'name' => 'ابو حجار', 'en_name' => 'Abohugar'],
        ];
        City::insert($cities);

        $state = State::where('name', 'النيل الازرق')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'الدمازين', 'en_name' => 'Ad-Damazin '],
            ['state_id' => $state->id, 'name' => 'الروصيرص', 'en_name' => 'Ar Roseires'],
            ['state_id' => $state->id, 'name' => 'باو', 'en_name' => 'Bau'],
            ['state_id' => $state->id, 'name' => 'الكرمك', 'en_name' => 'Al Kormok'],
            ['state_id' => $state->id, 'name' => 'التضامن', 'en_name' => 'Tadamon '],
            ['state_id' => $state->id, 'name' => 'قسيان', 'en_name' => 'Qeissan'],
        ];
        City::insert($cities);

        $state = State::where('name', 'النيل الابيض')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'ربك', 'en_name' => 'Rabak'],
            ['state_id' => $state->id, 'name' => 'كوستي', 'en_name' => 'Kosti'],
            ['state_id' => $state->id, 'name' => 'القطينة', 'en_name' => 'Al Gutaina'],
            ['state_id' => $state->id, 'name' => 'ام رمتة', 'en_name' => 'Omramta'],
            ['state_id' => $state->id, 'name' => 'الجبلين', 'en_name' => 'Al Jabalian'],
            ['state_id' => $state->id, 'name' => 'السلام', 'en_name' => ' Al Salam'],
            ['state_id' => $state->id, 'name' => 'الدويم', 'en_name' => 'Ad Douiem'],
            ['state_id' => $state->id, 'name' => 'تندلتي', 'en_name' => 'Tendelti'],
        ];
        City::insert($cities);

        $state = State::where('name', 'شمال كردفان')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'سودري', 'en_name' => 'Sawdiri'],
            ['state_id' => $state->id, 'name' => 'جبرة الشيخ', 'en_name' => 'Jebrat al Sheikh'],
            ['state_id' => $state->id, 'name' => 'بارا', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'غرب بارا', 'en_name' => 'Barah'],
            ['state_id' => $state->id, 'name' => 'شيكان', 'en_name' => 'West Barah'],
            ['state_id' => $state->id, 'name' => 'ام روابة', 'en_name' => 'Umm Ruwaba'],
            ['state_id' => $state->id, 'name' => 'ام دم', 'en_name' => 'Umm Dam'],
            ['state_id' => $state->id, 'name' => 'الرهد', 'en_name' => 'Er Rahad'],
        ];
        City::insert($cities);


        $state = State::where('name', 'جنوب كردفان')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'القوز', 'en_name' => 'Al Quoz'],
            ['state_id' => $state->id, 'name' => 'قدير', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'هيبان', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'تلودي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الليري', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'كادوقلي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'ابوجبيهة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'هبيلا', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'دلامي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'البرام', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'التضامن', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'رشاد', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'العباسية', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الدلنج', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الريف الشرقي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'ام دورين', 'en_name' => 'Northern'],
        ];
        City::insert($cities);

        $state = State::where('name', 'غرب كردفان')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'ود بندة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'ابوزبد', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'غبيش', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'النهود', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الاضية', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الخوي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'السلام', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'النهود', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'لقاوة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'كيلك', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الصنط', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'بابنوسة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'ابيي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الميرم', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الدبب', 'en_name' => 'Northern'],
        ];
        City::insert($cities);


        $state = State::where('name', 'شمال دارفور')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'الفاشر', 'en_name' => 'Al Fasher'],
            ['state_id' => $state->id, 'name' => 'ام كدادة', 'en_name' => 'Um Kadada'],
            ['state_id' => $state->id, 'name' => 'كتم', 'en_name' => 'Kutum'],
            ['state_id' => $state->id, 'name' => 'اللعيت', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'كلمندو', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'مليط', 'en_name' => 'Mellit'],
            ['state_id' => $state->id, 'name' => 'الكومة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'المالحة', 'en_name' => 'Al Malihah'],
            ['state_id' => $state->id, 'name' => 'دار السلام', 'en_name' => 'Dar Al Salam'],
            ['state_id' => $state->id, 'name' => 'كبكابية', 'en_name' => 'Kabkabiya'],
            ['state_id' => $state->id, 'name' => 'سرف عمرة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'السريف', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الطينة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'امبرو', 'en_name' => 'Umm Buru'],
            ['state_id' => $state->id, 'name' => 'كرنوي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'طويلة', 'en_name' => 'Tawilah'],
            ['state_id' => $state->id, 'name' => 'طويشة', 'en_name' => 'El Tawisha'],
        ];
        City::insert($cities);

        $state = State::where('name', 'وسط دارفور')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'زالنجي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'وادي صالح', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'مكجر', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'ام دخن', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'نيرتتي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'روكرو', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'بندسي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'ازوم', 'en_name' => 'Northern'],
        ];
        City::insert($cities);

        $state = State::where('name', 'شرق دارفور')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'الضعين', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'بحر العرب', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'عسلاية', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'ابو جابرة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الفردوس', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'شعيرية', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'ياسين', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'عديلة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'ابو كارنكا', 'en_name' => 'Northern'],
        ];
        City::insert($cities);

        $state = State::where('name', 'غرب دارفور')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'الجنينة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'كلبس', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'بيضة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'كرينك', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'سيرا', 'en_name' => 'Northern'],
        ];
        City::insert($cities);

        $state = State::where('name', 'جنوب دارفور')->first();
        $cities = [
            ['state_id' => $state->id, 'name' => 'نيالا', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'نيالا شمال', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'السلام', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'كاس', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'بليل', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'عد الفرسان', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'رهيد البردي', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'تلس', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'برام', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'قريضة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'نتيقة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'مرشينح', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'شرق جبل مرة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'السنطة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'كتيلا', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'ام دافوق', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الوحدة', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'الردوم', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'دمسو', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'شطاية', 'en_name' => 'Northern'],
            ['state_id' => $state->id, 'name' => 'كبم', 'en_name' => 'Northern'],
        ];
        City::insert($cities);
    }
}
