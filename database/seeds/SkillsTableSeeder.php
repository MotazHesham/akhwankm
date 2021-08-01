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
                'name_ar'              => 'يلعب كرة القدم',
                'name_en'            => 'play football',

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
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 5,
                'name_ar'              => 'يلعب تنس ',
                'name_en'            => 'play tennis',

            ],
            [
                'id'              => 6,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 7,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 8,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 9,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 10,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 11,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 12,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 13,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 14,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 15,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 16,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 17,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 18,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 19,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
            [
                'id'              => 20,
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
        ];

        Skill::insert($skills);
    }
}
