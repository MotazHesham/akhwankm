<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    { 
        $i = 1;
        $cities = [
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'ابها',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'ابو عريش',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'مكة المكرمة',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الدمام',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الدوادمي',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الدلم',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الدرعية',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'عفيف',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'احد المسارحة',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'احد رفيده',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'البكيرية'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الغاط'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الخبراء'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الخفجي'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'حائل'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الحريق'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الخرج'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الخبر'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الهفوف'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الخرمة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الجبيل'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الجموم'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'ليلى'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'مدينة الملك عبد الله الاقتصادية'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'المجاردة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'المجمعة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'المذنب'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'المزاحمية'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'القطيف'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'القنفذة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'القريات'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'القويعية'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الوجه'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'عنك'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'النعيرية'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'عرعر'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الرس'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'السليل'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الطائف'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الظهران'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الزلفي'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'بدر'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'بيشة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'بقيق'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'بريدة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'ضبا'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'حفر البطن'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'خميس مشيط'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'حوطه بنى تميم'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'خيبر'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'جدة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'محايل'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'رابغ'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'رفحاء'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'صفوى'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'سكاكا'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'صامطة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'شقراء'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'شروره'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'سيهات'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الشنان'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'ثادق'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'قريه العليا'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'صبيا'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'صفوى',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'سكاكا',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'صامطة',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'شقراء',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'شروره',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'سيهات',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الشنان',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'ثادق',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'بللسمر',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'راس تنورة',
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'تاروت'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'تثليث'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'تربه'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'طريف'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'ثول'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'عنيزة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الشماسية'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'ينبع'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الباحة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'المدينة المنورة'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'جازان'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'نجران'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الرياض'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'تبوك'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'الجندل'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'أملج'
            ],
            [
                'id' => $i++,
                'country_id' => 1,
                'name' => 'البدائع'
            ],
        ];
        City::insert($cities);
    }
}
