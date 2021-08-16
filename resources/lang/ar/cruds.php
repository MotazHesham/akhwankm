<?php

return [
    'userManagement' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => ' id',
            'id_helper'         => ' ',
            'title'             => 'اللقب',
            'title_helper'      => ' ',
            'created_at'        => 'أنشئت في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم حذفه',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => ' id   ',
            'id_helper'          => ' ',
            'title'              => 'اللقب',
            'title_helper'       => ' ',
            'permissions'        => 'الصلاحيات',
            'permissions_helper' => ' ',
            'created_at'         => 'أنشئت في ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم حذفه',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'pie' => 'عدد المستخدمين',
        'user_type' => [
            'big_brother' => 'الأخ الأكبر',
            'small_brother' => 'الأخ الأصغر',
        ],
        'fields'         => [
            'id'                       => 'id',
            'id_helper'                => ' ',
            'name'                     => 'اسم المستخدم',
            'name_helper'              => ' ',
            'email'                    => '   البريد إلكتروني',
            'email_helper'             => ' ',
            'email_verified_at'        => 'تم التحقق من البريد الإلكتروني في',
            'email_verified_at_helper' => ' ',
            'password'                 => ' كلمة المرور',
            'password_helper'          => ' ',
            'roles'                    => 'الدور',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               =>'أنشئت في ',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تم التحديث في ',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تم حذفه',
            'deleted_at_helper'        => ' ',
            'user_type'                => 'نوع المستخدم',
            'user_type_helper'         => ' ',
            'cv'                       => 'السيرة الذاتية',
            'cv_helper'                => ' ',
            'identity_number'          => ' رقم الهوية',
            'identity_number_helper'   => ' ',
            'identity_date'            => ' تاريخ انتهاء الهوية',
            'identity_date_helper'     => ' ',
            'dbo'                      => 'تاريخ الميلاد ',
            'dbo_helper'               => ' ',
            'country_id'                  => 'دولة',
            'country_id_helper'           => ' ',
            'city_id'                     => 'مدينة',
            'city_id_helper'              => ' ',
            'phone'                    => ' رقم الهاتف ',
            'phone_helper'             => ' ',
            'address'                  => 'العنوان',
            'address_helper'           => ' ',
            'gender'                   => 'الجنس',
            'gender_helper'            => ' ',
            'marital_status'           => ' الحالة الإجتماعية',
            'marital_status_helper'    => ' ',
            'degree'                   => ' الدرجة العلمية',
            'degree_helper'            => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => ' تنبيهات المستخدم', 
        'title_singular' => ' تنبيه المستخدم',
        'fields'         => [
            'id'                => 'المعرف',
            'id_helper'         => ' ',
            'alert_text'        => ' نص تنبيه',
            'alert_text_helper' => ' ',
            'alert_link'        => ' رابط التنبيه',
            'alert_link_helper' => ' ',
            'user'              => 'المستخدمين',
            'user_helper'       => ' ',
            'created_at'          => 'أنشئت في ',
            'created_at_helper'   => ' ',
            'updated_at'          => 'تم التحديث في ',
            'updated_at_helper'   => ' ',
        ],
    ],
    'smallBrother' => [
        'title'          => ' الأخ الأصغر',
        'title_singular' => ' الأخ الأصغر',
        'no_big_brother' =>' لا يوجد تعاقد مع أخ أكبر حتي الأن',
        'fields'         => [
            'id'                     => 'id',
            'id_helper'              => ' ',
            'user'                   => 'المستخدم',
            'user_helper'            => ' ',
            'created_at'         => 'أنشئت في ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم حذفه',
            'deleted_at_helper'  => ' ',
            'skills'                 => 'المهارات',
            'skills_helper'          => ' ',
            'big_brother'            => ' الأخ الأكبر',
            'big_brother_helper'     => ' ',
            'charactaristics'        => 'الصفات',
            'charactaristics_helper' => ' ',
            'temp'                   => 'Temp',
            'temp_helper'            => ' ',
            'brothers'                => 'بيانات الأخ الأكبر',
            'created_at_b'            =>'تاريخ تقديم الطلب'
          
        ],
    ],
    'bigBrother' => [
        'title'          =>' الأخ الأكبر',
        'title_singular' => ' الأخ الأكبر',
        'small'          =>  'بيانات الأخ الأصغر',
        'choose'          =>  'الأخوة المقترحين',
        'no_brother'          =>  ' لا يوجد أي تعاقدات مؤاخاة حتي الأن ! من فضلك اختر أخ أصغر من قائمة المقترحين ',
        'fields'         => [
            'id'                        => 'id',
            'id_helper'                 => ' ',
            'user'                      => 'البريد الإلكتروني',
            'user_helper'               => ' ',
            'job'                       => 'المهنة',
            'job_helper'                => ' ',
            'job_place'                 => 'مكان العمل',
            'job_place_helper'          => ' ',
            'salary'                    => 'المرتب',
            'salary_helper'             => ' ',
            'family_male'               => ' أفراد الأسرة الذكور',
            'family_male_helper'        => ' ',
            'family_female'             => ' أفراد الأسرة الإناث',
            'family_female_helper'      => ' ',
            'created_at'         => 'أنشئت في ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم حذفه',
            'deleted_at_helper'  => ' ',
            'brotherhood_reason'        => 'أسباب التآخي ',
            'brotherhood_reason_helper' => ' ',
            'charactarstics'            => 'الصفات',
            'charactarstics_helper'     => ' ',
            'skills'                    => 'المهارات',
            'skills_helper'             => ' ',
            'small_brother'                       => ' الأخ الأصغر',
            'small_brother_helper'                => ' ',
        ],
    ],
    'skill' => [
        'title'          => 'المهارات',
        'title_singular' => 'مهارة',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name_ar'           => 'الأسم باللغة العربية',
            'name_ar_helper'    => ' ',
            'name_en'           => 'الأسم باللغة الانجليزية',
            'name_en_helper'    => ' ',
            'created_at'         => 'أنشئت في ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم حذفه',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'characteristic' => [
        'title'          => 'الصفات',
        'title_singular' => 'صفة',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name_ar'           => 'الأسم باللغة العربية',
            'name_ar_helper'    => ' ',
            'name_en'           => 'الأسم باللغة الانجليزية',
            'name_en_helper'    => ' ',
            'created_at'         => 'أنشئت في ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم حذفه',
            'deleted_at_helper'  => ' ',
            'deleted_at_helper' => ' ',
        ],
    ],
    'outingType' => [
        'title'          => 'نوع النزهة',
        'title_singular' => 'نوع النزهة',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name_ar'           => 'الأسم باللغة العربية',
            'name_ar_helper'    => ' ',
            'name_en'           => 'الأسم باللغة الانجليزية',
            'name_en_helper'    => ' ',
            'created_at'         => 'أنشئت في ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم حذفه',
            'deleted_at_helper'  => ' ',
            'deleted_at_helper' => ' ',
        ],
    ],
    'brothersDealForm' => [
        'title'          => 'استمارات التعاقد   ',
        'title_singular' => 'استمارة تعاقد ',
        'latest' => 'أخر 5 استمارات تعاقد',
        'fields'         => [
            'id'                                  => 'id',
            'id_helper'                           => ' ',
            'day'                                 => 'يوم',
            'day_helper'                          => ' ',
            'department_of_social_service'        => 'قسم الخدمة الإجتماعية',
            'department_of_social_service_helper' => ' ',
            'executive_committee'                 => 'اللجنة التنفيذية',
            'executive_committee_helper'          => ' ',
            'specialist'                       => ' الإخصائي الإجتماعي ',
            'specialist_helper'                => ' ',
            'executive_director'                  => 'المدير التنفيذي  ',
            'executive_director_helper'           => ' ',
            'big_brother'                         => '   الأخ الأكبر ',
            'big_brother_helper'                  => ' ',
            'small_brother'                       => ' الأخ الأصغر',
            'small_brother_helper'                => ' ',
            'approvment_form'                    => ' رقم استمارة التوصية ',
            'approvment_form_helper'             => ' ',
            'created_at'         => 'أنشئت في ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم حذفه',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'outingRequest' => [
        'title'          => 'طلبات الخروج',
        'title_singular' => 'طلب الخروج',
        'latest' => 'أخر 5 طلبات خروج',
        'fields'         => [
            'id'                   => 'id',
            'id_helper'            => ' ',
            'outing_type'          => 'نوع النشاط',
            'outing_type_helper'   => ' ',
            'start_date'           => 'تاريخ البدء',
            'start_date_helper'    => ' ',
            'end_date'             => 'تاريخ الانتهاء',
            'end_date_helper'      => ' ',
            'place'                => 'المكان',
            'place_helper'         => ' ',
            'reason'               => 'أسباب التأخير',
            'reason_helper'        => ' ',
            'created_at'         => 'أنشئت في ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم حذفه',
            'deleted_at_helper'  => ' ',
            'late'                 => 'هل هناك تأخير ؟',
            'late_helper'          => ' ',
            'status'               => 'الحالة',
            'status_helper'        => ' ',
            'outing_date'          => 'تاريخ الخروج',
            'outing_date_helper'   => ' ',
            'done_time'            => 'وقت الرجوع',
            'done_time_helper'     => ' ',
            'big_brother'          => 'الأخ الأكبر ',
            'big_brother_helper'   => ' ',
            'small_brother'        => 'الأخ الأصغر ',
            'small_brother_helper' => ' ',
        ],
    ],
    'approvementForm' => [
        'title'          => ' استمارة التوصية ',
        'title_singular' => ' استمارة التوصية ',
        'fields'         => [
            'id'                        => 'id',
            'id_helper'                 => ' ',
            'approved'                  => 'الموافقة',
            'approved_helper'           => ' ',
            'specialist'                => 'الإخصائي',
            'specialist_helper'         => ' ',
            'created_at'         => 'أنشئت في ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم حذفه',
            'deleted_at_helper'  => ' ',
            'big_brother'        => 'الأخ الأكبر',
            'big_brother_helper' => ' ',
            'small_brother'        => 'الأخ الأصغر ',
            'small_brother_helper' => ' ',
            'reason'                    => 'الأسباب',
            'reason_helper'             => ' ',
            'description'               => 'توصية الأخصائية الإجتماعية',
            'description_helper'        => ' ',
            'descision'                 => 'قرار اللجنة العليا للجمعية',
            'descision_helper'          => ' ',
        ],
    ],
    'outingManagment' => [
        'title'          => 'طلبات الخروج',
        'title_singular' => 'طلبات الخروج',
    ],
    'generalSetting' => [
        'title'          => 'الأعدادات العامة',
        'title_singular' => 'الأعدادات العامة',
    ],
    'datingSession' => [
        'title'          => 'جلسات التعارف',
        'title_singular' => 'جلسة تعارف',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'interview_notes'        => 'ملاحظات',
            'interview_notes_helper' => ' ',
            'recommendations'        => 'اقترحات',
            'recommendations_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'date'                   => 'التاريخ',
            'date_helper'            => ' ',
            'specialist'             => 'الأخصائي',
            'specialist_helper'      => ' ',
            'big_brother'            => 'الأخ الأكبر',
            'big_brother_helper'     => ' ',
            'small_brother'         => ' الأخ الأصغر',
            'small_brother_helper'     => ' ',
                
        ],
    ],
    'country' => [
        'title'          => 'الدول',
        'title_singular' => 'دولة',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'الأسم',
            'name_helper'       => ' ',
            'short_code'        => 'كود الدولة',
            'short_code_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'city' => [
        'title'          => 'المدن',
        'title_singular' => 'مدينة',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'الأسم',
            'name_helper'       => ' ',
            'country'           => 'الدولة',
            'country_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
