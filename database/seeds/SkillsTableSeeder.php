<?php

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
                'name_ar'              => 'يلعب كرة القدم',
                'name_en'            => 'play football',

            ],
            [
                'name_ar'              => 'سباح',
                'name_en'            => 'play swimming'

            ],
            [
                'name_ar'              => 'يستطيع الطبخ',
                'name_en'            => 'can cook',

            ],
            [
                'name_ar'              => 'متفوق',
                'name_en'            => 'successful',

            ],
        ];

        User::insert($skills);
    }
}
