<?php

use Illuminate\Database\Seeder;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\GeneralSettings::create([
            'terms' => '..', 
        ]);
    }
}
