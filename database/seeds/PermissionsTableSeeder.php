<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'small_brother_create',
            ],
            [
                'id'    => 24,
                'title' => 'small_brother_edit',
            ],
            [
                'id'    => 25,
                'title' => 'small_brother_show',
            ],
            [
                'id'    => 26,
                'title' => 'small_brother_delete',
            ],
            [
                'id'    => 27,
                'title' => 'small_brother_access',
            ],
            [
                'id'    => 28,
                'title' => 'big_brother_create',
            ],
            [
                'id'    => 29,
                'title' => 'big_brother_edit',
            ],
            [
                'id'    => 30,
                'title' => 'big_brother_show',
            ],
            [
                'id'    => 31,
                'title' => 'big_brother_delete',
            ],
            [
                'id'    => 32,
                'title' => 'big_brother_access',
            ],
            [
                'id'    => 33,
                'title' => 'skill_create',
            ],
            [
                'id'    => 34,
                'title' => 'skill_edit',
            ],
            [
                'id'    => 35,
                'title' => 'skill_show',
            ],
            [
                'id'    => 36,
                'title' => 'skill_delete',
            ],
            [
                'id'    => 37,
                'title' => 'skill_access',
            ],
            [
                'id'    => 38,
                'title' => 'characteristic_create',
            ],
            [
                'id'    => 39,
                'title' => 'characteristic_edit',
            ],
            [
                'id'    => 40,
                'title' => 'characteristic_show',
            ],
            [
                'id'    => 41,
                'title' => 'characteristic_delete',
            ],
            [
                'id'    => 42,
                'title' => 'characteristic_access',
            ],
            [
                'id'    => 43,
                'title' => 'outing_type_create',
            ],
            [
                'id'    => 44,
                'title' => 'outing_type_edit',
            ],
            [
                'id'    => 45,
                'title' => 'outing_type_show',
            ],
            [
                'id'    => 46,
                'title' => 'outing_type_delete',
            ],
            [
                'id'    => 47,
                'title' => 'outing_type_access',
            ],
            [
                'id'    => 48,
                'title' => 'brothers_deal_form_create',
            ],
            [
                'id'    => 49,
                'title' => 'brothers_deal_form_edit',
            ],
            [
                'id'    => 50,
                'title' => 'brothers_deal_form_show',
            ],
            [
                'id'    => 51,
                'title' => 'brothers_deal_form_delete',
            ],
            [
                'id'    => 52,
                'title' => 'brothers_deal_form_access',
            ],
            [
                'id'    => 53,
                'title' => 'outing_request_create',
            ],
            [
                'id'    => 54,
                'title' => 'outing_request_edit',
            ],
            [
                'id'    => 55,
                'title' => 'outing_request_show',
            ],
            [
                'id'    => 56,
                'title' => 'outing_request_delete',
            ],
            [
                'id'    => 57,
                'title' => 'outing_request_access',
            ],
            [
                'id'    => 58,
                'title' => 'approvement_form_create',
            ],
            [
                'id'    => 59,
                'title' => 'approvement_form_edit',
            ],
            [
                'id'    => 60,
                'title' => 'approvement_form_show',
            ],
            [
                'id'    => 61,
                'title' => 'approvement_form_delete',
            ],
            [
                'id'    => 62,
                'title' => 'approvement_form_access',
            ],
            [
                'id'    => 63,
                'title' => 'outing_managment_access',
            ],
            [
                'id'    => 64,
                'title' => 'general_setting_access',
            ],
            [
                'id'    => 65,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
