<?php

use Illuminate\Database\Seeder;
use App\Models\Challengetype;


class ChallengeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Challengetype = [
            [
                'id'              => 1,
                'name_ar'              => 'حل المشكلات '   ,
                'name_en'            => 'Problem Solving',

            ],
            [
                'id'              => 2,
                'name_ar'              => ' التغلب على المخاوف'   ,
                'name_en'            => 'Overcoming fears',

            ],
            [
                'id'              => 3,
                'name_ar'              => ' الثقة بالنفس '   ,
                'name_en'            => 'Self confidence',

            ],

            [
                'id'              => 4,
                'name_ar'              => 'الإيجابية   '   ,
                'name_en'            => 'positivity',

            ],

            [
                'id'              => 5,
                'name_ar'              => ' المصداقية   '   ,
                'name_en'            => 'credibility ',

            ], [
                'id'              => 6,
                'name_ar'              => 'التعايش مع الآخرين    '   ,
                'name_en'            => 'coexistence with others',

            ], [
                'id'              => 7,
                'name_ar'              => 'معرفة الذات      '   ,
                'name_en'            => 'self-knowledge',

            ], [
                'id'              => 8,
                'name_ar'              => 'احترام الذات      '   ,
                'name_en'            => 'Self-esteem',

            ], 
            [ 
             'id'              => 9,
            'name_ar'              => 'تقبل النصيحة       '   ,
            'name_en'            => 'accept advice  ',

        ],
        [
            'id'              => 10,
            'name_ar'              => 'الاقدام         '   ,
            'name_en'            => 'bravery',

        ],
        [
            'id'              => 11,
            'name_ar'              => 'التواصل         '   ,
            'name_en'            => 'communication',

        ],
            [
                'id'              => 12,
                'name_ar'              => 'الإنصات وحسن الاستماع         '   ,
                'name_en'            => 'Listening and good listening',

            ],
    
            [
                'id'              => 13,
                'name_ar'              => ' إدارة الوقت        '   ,
                'name_en'            =>'time management',

            ],
            [
                'id'              => 14,
                'name_ar'              => 'المرونة '   ,
                'name_en'            => ' Flexibility',

            ],
               
            [
                'id'              => 15,
                'name_ar'              => ' العمل الجماعي          '   ,
                'name_en'            => 'Teamwork',

            ],
            [
                'id'              => 16,
                'name_ar'              => 'التفاوض والاقناع       '   ,
                'name_en'            => 'negotiation and persuasion',

            ],
            [
                'id'              => 17,
                'name_ar'              => 'تحمل الضغوط        '   ,
                'name_en'            => 'withstand stress',

            ],
            [
                'id'              => 18,
                'name_ar'              => ' الحزم      '   ,
                'name_en'            => 'Firmness ',

            ],
            [
                'id'              => 19,
                'name_ar'              => 'التنظيم والترتيب          '   ,
                'name_en'            => ' Organizing and arranging',

            ],
            [
                'id'              => 20,
                'name_ar'              => ' أخري       '   ,
                'name_en'            => 'other ',

            ],


        ];

        Challengetype::insert($Challengetype);
    }
}


 


 


