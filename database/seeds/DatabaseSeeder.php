<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CountriesTableSeeder::class, 
            CitiesSeeder::class, 
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            CharacteristicsTableSeeder::class,
            SkillsTableSeeder::class, 
            GeneralSettingsSeeder::class, 
        ]);
    }
}
