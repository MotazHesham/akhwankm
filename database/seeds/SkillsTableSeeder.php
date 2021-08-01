<?php
use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            [
                'id'              => 1,
                'name_ar'              => 'كرة القدم',
                'name_en'            => 'football',

            ],
            [
                'id'              => 2,
                'name_ar'              => 'سباح',
                'name_en'            => 'play swimming'

            ],
            [
                'id'              => 3,
                'name_ar'              => 'يستطيع الطبخ',
                'name_en'            => 'can cook',

            ],
            [
                'id'              => 4,
                'name_ar'              => 'الجري',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 5,
                'name_ar'              => 'يلعب تنس ',
                'name_en'            => 'play tennis',

            ],
            [
                'id'              => 6,
                'name_ar'              => 'ركوب الخيل',
                'name_en'            => 'riding hourse',

            ],
            [
                'id'              => 7,
                'name_ar'              => 'رسام',
                'name_en'            => 'painting',

            ], 
        ];

        Skill::insert($skills);
    }
}
