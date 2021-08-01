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
        ];

        Skill::insert($skills);
    }
}
