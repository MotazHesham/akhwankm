<?php

use Illuminate\Database\Seeder;

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
                'name_ar'              => 'التواصل'   ,
                'name_en'            => 'communication',

            ],
            [
                'name_ar'              => 'العنف والشدة'   ,
                'name_en'            => 'violence and severity',

            ],
            [
                'name_ar'              => 'الإنصات وحسن الاستماع'   ,
                'name_en'            => 'listen and listen well',

            ],

            [
                'name_ar'              => 'القلق   '   ,
                'name_en'            => 'worry',

            ],

            [
                'name_ar'              => 'ادارة الوقت   '   ,
                'name_en'            => 'time management',

            ], [
                'name_ar'              => 'الثقة بالنفس   '   ,
                'name_en'            => 'self-confidence',

            ], [
                'name_ar'              => 'المرونة      '   ,
                'name_en'            => 'flexibility',

            ], [
                'name_ar'              => 'التردد      '   ,
                'name_en'            => 'hesitant',

            ], [
                'name_ar'              => 'العمل الجماعي   '   ,
                'name_en'            => 'Teamwork',

            ],
            [
                'name_ar'              => 'الإنطواء         '   ,
                'name_en'            => 'introversion',

            ],
            [
                'name_ar'              => 'التفاوض والاقناع       '   ,
                'name_en'            => 'negotiation and persuasion',

            ],
            [
                'name_ar'              => 'التعايش مع الآخرين       '   ,
                'name_en'            => 'coexistence with others',

            ],
            [
                'name_ar'              => 'التنظيم والترتيب      '   ,
                'name_en'            => 'organized and arranged',

            ],
            [
                'name_ar'              => 'معرفة الذات      '   ,
                'name_en'            => 'knowledge of self',

            ],
            [
                'name_ar'              => 'الأفكار السلبية      '   ,
                'name_en'            => 'negative thoughts',

            ],
            [
                'name_ar'              => 'تقدير الذات      '   ,
                'name_en'            => 'self-esteem',

            ],
            [
                'name_ar'              => 'التغلب على المخاوف       '   ,
                'name_en'            => 'overcoming fears',

            ],
            [
                'name_ar'              => 'تقبل النصيحة       '   ,
                'name_en'            => 'accept advice  ',

            ],

            [
                'name_ar'              => 'الاقدام         '   ,
                'name_en'            => 'bravery',

            ],
            [
                'name_ar'              => 'المصداقية         '   ,
                'name_en'            => 'credibility',

            ],
            [
                'name_ar'              => 'الإندفاعية         '   ,
                'name_en'            => 'impulsive',

            ],
            [
                'name_ar'              => 'تحمل الضغوط        '   ,
                'name_en'            => 'withstand stress',

            ],
            [
                'name_ar'              => 'حل المشكلات      '   ,
                'name_en'            => 'Problem Solving',

            ],


        ];

        User::insert($Characteristics);
    }
}
