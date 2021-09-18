<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $i = 1;

        $permissions = [
            [
                'id' => $i++,
                'title' => 'user_management_access',
            ],
            [
                'id' => $i++,
                'title' => 'permission_edit',
            ],
            [
                'id' => $i++,
                'title' => 'permission_show',
            ],
            [
                'id' => $i++,
                'title' => 'permission_delete',
            ],
            [
                'id' => $i++,
                'title' => 'permission_access',
            ],
            [
                'id' => $i++,
                'title' => 'role_create',
            ],
            [
                'id' => $i++,
                'title' => 'role_edit',
            ],
            [
                'id' => $i++,
                'title' => 'role_show',
            ],
            [
                'id' => $i++,
                'title' => 'role_delete',
            ],
            [
                'id' => $i++,
                'title' => 'role_access',
            ],
            [
                'id' => $i++,
                'title' => 'user_create',
            ],
            [
                'id' => $i++,
                'title' => 'user_edit',
            ],
            [
                'id' => $i++,
                'title' => 'user_show',
            ],
            [
                'id' => $i++,
                'title' => 'user_delete',
            ],
            [
                'id' => $i++,
                'title' => 'user_access',
            ],
            [
                'id' => $i++,
                'title' => 'audit_log_show',
            ],
            [
                'id' => $i++,
                'title' => 'audit_log_access',
            ],
            [
                'id' => $i++,
                'title' => 'user_alert_create',
            ],
            [
                'id' => $i++,
                'title' => 'user_alert_show',
            ],
            [
                'id' => $i++,
                'title' => 'user_alert_delete',
            ],
            [
                'id' => $i++,
                'title' => 'user_alert_access',
            ],
            [
                'id' => $i++,
                'title' => 'small_brother_create',
            ],
            [
                'id' => $i++,
                'title' => 'small_brother_edit',
            ],
            [
                'id' => $i++,
                'title' => 'small_brother_show',
            ],
            [
                'id' => $i++,
                'title' => 'small_brother_delete',
            ],
            [
                'id' => $i++,
                'title' => 'small_brother_access',
            ],
            [
                'id' => $i++,
                'title' => 'big_brother_create',
            ],
            [
                'id' => $i++,
                'title' => 'big_brother_edit',
            ],
            [
                'id' => $i++,
                'title' => 'big_brother_show',
            ],
            [
                'id' => $i++,
                'title' => 'big_brother_delete',
            ],
            [
                'id' => $i++,
                'title' => 'big_brother_access',
            ],
            [
                'id' => $i++,
                'title' => 'skill_create',
            ],
            [
                'id' => $i++,
                'title' => 'skill_edit',
            ],
            [
                'id' => $i++,
                'title' => 'skill_show',
            ],
            [
                'id' => $i++,
                'title' => 'skill_delete',
            ],
            [
                'id' => $i++,
                'title' => 'skill_access',
            ],
            [
                'id' => $i++,
                'title' => 'characteristic_create',
            ],
            [
                'id' => $i++,
                'title' => 'characteristic_edit',
            ],
            [
                'id' => $i++,
                'title' => 'characteristic_show',
            ],
            [
                'id' => $i++,
                'title' => 'characteristic_delete',
            ],
            [
                'id' => $i++,
                'title' => 'characteristic_access',
            ],
            [
                'id' => $i++,
                'title' => 'outing_type_create',
            ],
            [
                'id' => $i++,
                'title' => 'outing_type_edit',
            ],
            [
                'id' => $i++,
                'title' => 'outing_type_show',
            ],
            [
                'id' => $i++,
                'title' => 'outing_type_delete',
            ],
            [
                'id' => $i++,
                'title' => 'outing_type_access',
            ],
            [
                'id' => $i++,
                'title' => 'brothers_deal_form_create',
            ],
            [
                'id' => $i++,
                'title' => 'brothers_deal_form_edit',
            ],
            [
                'id' => $i++,
                'title' => 'brothers_deal_form_show',
            ],
            [
                'id' => $i++,
                'title' => 'brothers_deal_form_delete',
            ],
            [
                'id' => $i++,
                'title' => 'brothers_deal_form_access',
            ],
            [
                'id' => $i++,
                'title' => 'outing_request_create',
            ],
            [
                'id' => $i++,
                'title' => 'outing_request_edit',
            ],
            [
                'id' => $i++,
                'title' => 'outing_request_show',
            ],
            [
                'id' => $i++,
                'title' => 'outing_request_delete',
            ],
            [
                'id' => $i++,
                'title' => 'outing_request_access',
            ],
            [
                'id' => $i++,
                'title' => 'approvement_form_create',
            ],
            [
                'id' => $i++,
                'title' => 'approvement_form_edit',
            ],
            [
                'id' => $i++,
                'title' => 'approvement_form_show',
            ],
            [
                'id' => $i++,
                'title' => 'approvement_form_delete',
            ],
            [
                'id' => $i++,
                'title' => 'approvement_form_access',
            ],
            [
                'id' => $i++,
                'title' => 'outing_managment_access',
            ],
            [
                'id' => $i++,
                'title' => 'general_setting_access',
            ],
            [
                'id' => $i++,
                'title' => 'dating_session_create',
            ],
            [
                'id' => $i++,
                'title' => 'dating_session_edit',
            ],
            [
                'id' => $i++,
                'title' => 'dating_session_show',
            ],
            [
                'id' => $i++,
                'title' => 'dating_session_delete',
            ],
            [
                'id' => $i++,
                'title' => 'dating_session_access',
            ],
            [
                'id' => $i++,
                'title' => 'reporting_management_access',
            ],
            [
                'id' => $i++,
                'title' => 'report_type_create',
            ],
            [
                'id' => $i++,
                'title' => 'report_type_edit',
            ],
            [
                'id' => $i++,
                'title' => 'report_type_show',
            ],
            [
                'id' => $i++,
                'title' => 'report_type_delete',
            ],
            [
                'id' => $i++,
                'title' => 'report_type_access',
            ],
            [
                'id' => $i++,
                'title' => 'report_create',
            ],
            [
                'id' => $i++,
                'title' => 'report_edit',
            ],
            [
                'id' => $i++,
                'title' => 'report_show',
            ],
            [
                'id' => $i++,
                'title' => 'report_delete',
            ],
            [
                'id' => $i++,
                'title' => 'report_access',
            ],
            [
                'id' => $i++,
                'title' => 'country_create',
            ],
            [
                'id' => $i++,
                'title' => 'country_edit',
            ],
            [
                'id' => $i++,
                'title' => 'country_show',
            ],
            [
                'id' => $i++,
                'title' => 'country_delete',
            ],
            [
                'id' => $i++,
                'title' => 'country_access',
            ],
            [
                'id' => $i++,
                'title' => 'city_create',
            ],
            [
                'id' => $i++,
                'title' => 'city_edit',
            ],
            [
                'id' => $i++,
                'title' => 'city_show',
            ],
            [
                'id' => $i++,
                'title' => 'city_delete',
            ],
            [
                'id' => $i++,
                'title' => 'city_access',
            ],
            [
                'id' => $i++,
                'title' => 'periodic_session_create',
            ],
            [
                'id' => $i++,
                'title' => 'periodic_session_edit',
            ],
            [
                'id' => $i++,
                'title' => 'periodic_session_show',
            ],
            [
                'id' => $i++,
                'title' => 'periodic_session_delete',
            ],
            [
                'id' => $i++,
                'title' => 'periodic_session_access',
            ],
            [
                'id' => $i++,
                'title' => 'specialist_create',
            ],
            [
                'id' => $i++,
                'title' => 'specialist_edit',
            ],
            [
                'id' => $i++,
                'title' => 'specialist_show',
            ],
            [
                'id' => $i++,
                'title' => 'specialist_delete',
            ],
            [
                'id' => $i++,
                'title' => 'specialist_access',
            ],
            [
                'id' => $i++,
                'title' => 'profile_password_edit',
            ],
            [
                'id' => $i++,
                'title' => 'inequality_access',
            ],
            [
                'id' => $i++,
                'title' => 'inequality_show',
            ],
            [
                'id' => $i++,
                'title' => 'inequality_edit',
            ],
            [
                'id' => $i++,
                'title' => 'inequality_delete',
            ],
            [
                'id' => $i++,
                'title' => 'inequality_create',
            ],

            [
                'id' => $i++,
                'title' => 'taking_note_create',
            ],
            [
                'id' => $i++,
                'title' => 'taking_note_edit',
            ],
            [
                'id' => $i++,
                'title' => 'taking_note_show',
            ],
            [
                'id' => $i++,
                'title' => 'taking_note_delete',
            ],
            [
                'id' => $i++,
                'title' => 'taking_note_access',
            ],
            [
                'id' => $i++,
                'title' => 'challengetype_access',
            ],
            [
                'id' => $i++,
                'title' => 'challenge_create',
            ],
            [
                'id' => $i++,
                'title' => 'challenge_edit',
            ],
            [
                'id' => $i++,
                'title' => 'challenge_show',
            ],
            [
                'id' => $i++,
                'title' => 'challenge_delete',
            ],
            [
                'id' => $i++,
                'title' => 'big_brother_rating_create',
            ],
            [
                'id' => $i++,
                'title' => 'big_brother_rating_edit',
            ],
            [
                'id' => $i++,
                'title' => 'big_brother_rating_show',
            ],
            [
                'id' => $i++,
                'title' => 'big_brother_rating_delete',
            ],
            [
                'id' => $i++,
                'title' => 'big_brother_rating_access',
            ],
            [
                'id' => $i++,
                'title' => 'small_brother_rating_create',
            ],
            [
                'id' => $i++,
                'title' => 'small_brother_rating_edit',
            ],
            [
                'id' => $i++,
                'title' => 'small_brother_rating_show',
            ],
            [
                'id' => $i++,
                'title' => 'small_brother_rating_delete',
            ],
            [
                'id' => $i++,
                'title' => 'small_brother_rating_access',
            ],
            [
                'id' => $i++,
                'title' => 'managers_ratting_create',
            ],
            [
                'id' => $i++,
                'title' => 'managers_ratting_edit',
            ],
            [
                'id' => $i++,
                'title' => 'managers_ratting_show',
            ],
            [
                'id' => $i++,
                'title' => 'managers_ratting_delete',
            ],
            [
                'id' => $i++,
                'title' => 'managers_ratting_access',
            ],
            [
                'id' => $i++,
                'title' => 'report_type_create',
            ],
            [
                'id' => $i++,
                'title' => 'report_type_edit',
            ],
            [
                'id' => $i++,
                'title' => 'report_type_show',
            ],
            [
                'id' => $i++,
                'title' => 'report_type_delete',
            ],
            [
                'id' => $i++,
                'title' => 'report_type_access',
            ],
            [
                'id' => $i++,
                'title' => 'reporting_create',
            ],
            [
                'id' => $i++,
                'title' => 'reporting_edit',
            ],
            [
                'id' => $i++,
                'title' => 'reporting_show',
            ],
            [
                'id' => $i++,
                'title' => 'reporting_delete',
            ],
            [
                'id' => $i++,
                'title' => 'reporting_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
