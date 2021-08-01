<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'أدمن',
            ],
            [
                'id'    => 2,
                'title' => 'متخصص',
            ],
        ];

        Role::insert($roles);
    }
}
