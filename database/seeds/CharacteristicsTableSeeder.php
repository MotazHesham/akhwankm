<?php

use Illuminate\Database\Seeder;
use App\Models\Characteristic;
class CharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Characteristics = [
            [
                'id'              => 1,
                'name_ar'              => 'التواصل'   ,
                'name_en'            => 'communication',

            ],
            [
                'id'              => 2,
                'name_ar'              => 'العنف والشدة'   ,
                'name_en'            => 'violence and severity',

            ],
            [
                'id'              => 3,
                'name_ar'              => 'الإنصات وحسن الاستماع'   ,
                'name_en'            => 'listen and listen well',

            ],

            [
                'id'              => 4,
                'name_ar'              => 'القلق   '   ,
                'name_en'            => 'worry',

            ],

            [
                'id'              => 5,
                'name_ar'              => 'ادارة الوقت   '   ,
                'name_en'            => 'time management',

            ], [
                'id'              => 6,
                'name_ar'              => 'الثقة بالنفس   '   ,
                'name_en'            => 'self-confidence',

            ], [
                'id'              => 7,
                'name_ar'              => 'المرونة      '   ,
                'name_en'            => 'flexibility',

            ], [
                'id'              => 8,
                'name_ar'              => 'التردد      '   ,
                'name_en'            => 'hesitant',

            ], [
                'id'              => 9,
                'name_ar'              => 'العمل الجماعي   '   ,
                'name_en'            => 'Teamwork',

            ],
            [
                'id'              => 10,
                'name_ar'              => 'الإنطواء         '   ,
                'name_en'            => 'introversion',

            ],
            [
                'id'              => 11,
                'name_ar'              => 'التفاوض والاقناع       '   ,
                'name_en'            => 'negotiation and persuasion',

            ],
            [
                'id'              => 12,
                'name_ar'              => 'التعايش مع الآخرين       '   ,
                'name_en'            => 'coexistence with others',

            ],
            [
                'id'              => 13,
                'name_ar'              => 'التنظيم والترتيب      '   ,
                'name_en'            => 'organized and arranged',

            ],
            [
                'id'              => 14,
                'name_ar'              => 'معرفة الذات      '   ,
                'name_en'            => 'knowledge of self',

            ],
            [
                'id'              => 15,
                'name_ar'              => 'الأفكار السلبية      '   ,
                'name_en'            => 'negative thoughts',

            ],
            [
                'id'              => 16,
                'name_ar'              => 'تقدير الذات      '   ,
                'name_en'            => 'self-esteem',

            ],
            [
                'id'              => 17,
                'name_ar'              => 'التغلب على المخاوف       '   ,
                'name_en'            => 'overcoming fears',

            ],
            [
                'id'              => 18,
                'name_ar'              => 'تقبل النصيحة       '   ,
                'name_en'            => 'accept advice  ',

            ],

            [
                'id'              => 19,
                'name_ar'              => 'الاقدام         '   ,
                'name_en'            => 'bravery',

            ],
            [
                'id'              => 20,
                'name_ar'              => 'المصداقية         '   ,
                'name_en'            => 'credibility',

            ],
            [
                'id'              => 21,
                'name_ar'              => 'الإندفاعية         '   ,
                'name_en'            => 'impulsive',

            ],
            [
                'id'              => 22,
                'name_ar'              => 'تحمل الضغوط        '   ,
                'name_en'            => 'withstand stress',

            ],
            [
                'id'              => 23,
                'name_ar'              => 'حل المشكلات      '   ,
                'name_en'            => 'Problem Solving',

            ],


        ];

        Characteristic::insert($Characteristics);
    }
}
