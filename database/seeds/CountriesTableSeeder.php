<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        $countries = [
            [
                'id'         => 1,
                'name'       => 'المملكة العربية السعودية',
            ],
        ];

        Country::insert($countries);
    }
}
