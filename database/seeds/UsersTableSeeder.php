<?php

use App\Models\User;


use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'              => 1,
                'name'            => 'Admin',
                'email'           => 'admin@admin.com',
                'password'        => bcrypt('password'),
                'remember_token'  => null,
                'user_type'       => 'staff',
                'identity_number' => '',
                'marital_status'  => '',
                'country'         => '',
                'city'            => '',
                'phone'           => '',
                'address'         => '',
                'degree'          => '',
            ],
        ];

        User::insert($users);
    }
}
