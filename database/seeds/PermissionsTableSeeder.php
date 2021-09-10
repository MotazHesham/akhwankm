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
                'title' => 'dating_session_create',
            ],
            [
                'id'    => 66,
                'title' => 'dating_session_edit',
            ],
            [
                'id'    => 67,
                'title' => 'dating_session_show',
            ],
            [
                'id'    => 68,
                'title' => 'dating_session_delete',
            ],
            [
                'id'    => 69,
                'title' => 'dating_session_access',
            ],
            [
                'id'    => 70,
                'title' => 'reporting_management_access',
            ],
            [
                'id'    => 71,
                'title' => 'report_type_create',
            ],
            [
                'id'    => 72,
                'title' => 'report_type_edit',
            ],
            [
                'id'    => 73,
                'title' => 'report_type_show',
            ],
            [
                'id'    => 74,
                'title' => 'report_type_delete',
            ],
            [
                'id'    => 75,
                'title' => 'report_type_access',
            ],
            [
                'id'    => 76,
                'title' => 'report_create',
            ],
            [
                'id'    => 77,
                'title' => 'report_edit',
            ],
            [
                'id'    => 78,
                'title' => 'report_show',
            ],
            [
                'id'    => 79,
                'title' => 'report_delete',
            ],
            [
                'id'    => 80,
                'title' => 'report_access',
            ],
            [
                'id'    => 81,
                'title' => 'country_create',
            ],
            [
                'id'    => 82,
                'title' => 'country_edit',
            ],
            [
                'id'    => 83,
                'title' => 'country_show',
            ],
            [
                'id'    => 84,
                'title' => 'country_delete',
            ],
            [
                'id'    => 85,
                'title' => 'country_access',
            ],
            [
                'id'    => 86,
                'title' => 'city_create',
            ],
            [
                'id'    => 87,
                'title' => 'city_edit',
            ],
            [
                'id'    => 88,
                'title' => 'city_show',
            ],
            [
                'id'    => 89,
                'title' => 'city_delete',
            ],
            [
                'id'    => 90,
                'title' => 'city_access',
            ],
            [
                'id'    => 91,
                'title' => 'periodic_session_create',
            ],
            [
                'id'    => 92,
                'title' => 'periodic_session_edit',
            ],
            [
                'id'    => 93,
                'title' => 'periodic_session_show',
            ],
            [
                'id'    => 94,
                'title' => 'periodic_session_delete',
            ],
            [
                'id'    => 95,
                'title' => 'periodic_session_access',
            ],
            [
                'id'    => 96,
                'title' => 'specialist_create',
            ],
            [
                'id'    => 97,
                'title' => 'specialist_edit',
            ],
            [
                'id'    => 98,
                'title' => 'specialist_show',
            ],
            [
                'id'    => 99,
                'title' => 'specialist_delete',
            ],
            [
                'id'    => 100,
                'title' => 'specialist_access',
            ],
            [
                'id'    => 101,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 102,
                'title' => 'inequality_access',
            ],
            [
                'id'    => 103,
                'title' => 'inequality_show',
        ],
              [
               'id'    => 104,
              'title' => 'inequality_edit',
            ],
            [
                'id'    => 105,
                'title' => 'inequality_delete',
        ],
        [
                'id'    => 106,
                'title' => 'inequality_create',
        ],

            [
                'id'    => 107,
                'title' => 'taking_note_create',
            ],
            [
                'id'    => 108,
                'title' => 'taking_note_edit',
            ],
            [
                'id'    => 109,
                'title' => 'taking_note_show',
            ],
            [
                'id'    => 110,
                'title' => 'taking_note_delete',
            ],
            [
                'id'    => 111,
                'title' => 'taking_note_access',
            ],
            [
                'id'    => 112,
                'title' => 'challengetype_access',
            ],
            [
                'id'    => 113,
                'title' => 'challenge_create',
            ],
            [
                'id'    => 114,
                'title' => 'challenge_edit',
            ],
            [
                'id'    => 115,
                'title' => 'challenge_show',
            ],
            [
                'id'    => 116,
                'title' => 'challenge_delete',
            ],
            [
                'id'    => 117,
                'title' => 'big_brother_rating_create',
            ],
            [
                'id'    => 118,
                'title' => 'big_brother_rating_edit',
            ],
            [
                'id'    => 119,
                'title' => 'big_brother_rating_show',
            ],
            [
                'id'    => 120,
                'title' => 'big_brother_rating_delete',
            ],
            [
                'id'    => 121,
                'title' => 'big_brother_rating_access',
            ],
            [
                'id'    => 122,
                'title' => 'small_brother_rating_create',
            ],
            [
                'id'    => 123,
                'title' => 'small_brother_rating_edit',
            ],
            [
                'id'    => 124,
                'title' => 'small_brother_rating_show',
            ],
            [
                'id'    => 125,
                'title' => 'small_brother_rating_delete',
            ],
            [
                'id'    => 126,
                'title' => 'small_brother_rating_access',
            ],
            [
                'id'    => 127,
                'title' => 'managers_ratting_create',
            ],
            [
                'id'    => 128,
                'title' => 'managers_ratting_edit',
            ],
            [
                'id'    => 129,
                'title' => 'managers_ratting_show',
            ],
            [
                'id'    => 130,
                'title' => 'managers_ratting_delete',
            ],
            [
                'id'    => 131,
                'title' => 'managers_ratting_access',
            ],
            
        ];

        Permission::insert($permissions);
    }
}
