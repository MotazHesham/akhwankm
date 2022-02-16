@php
$general_settings = \App\Models\GeneralSettings::select('admin_color')->first();
@endphp


<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show"
    style="background: {{ $general_settings->admin_color ?? '' }}">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.chatting.index') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fab fa-fw fa-facebook-messenger">

                </i>
                {{ trans('global.chatting') }}
            </a>
        </li>
        @can('user_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }} {{ request()->is('admin/audit-logs*') ? 'c-show' : '' }} {{ request()->is('admin/small-brothers*') ? 'c-show' : '' }} {{ request()->is('admin/big-brothers*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        {{-- <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li> --}}
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('specialist_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.specialists.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/specialists') || request()->is('admin/specialists/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user-tag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.specialist.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('small_brother_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.small-brothers.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/small-brothers') || request()->is('admin/small-brothers/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-child c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.smallBrother.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('big_brother_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.big-brothers.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/big-brothers') || request()->is('admin/big-brothers/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-male c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.bigBrother.title') }}
                            </a>
                        </li>
                    @endcan

                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.audit-logs.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.user-alerts.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan

        @can('approvement_form_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.approvement-forms.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/approvement-forms') || request()->is('admin/approvement-forms/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-check-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.approvementForm.title') }}
                </a>
            </li>
        @endcan
        @can('dating_session_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.dating-sessions.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/dating-sessions') || request()->is('admin/dating-sessions/*') ? 'c-active' : '' }}">
                    <i class="fa-fw far fa-clock c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.datingSession.title') }}
                </a>
            </li>
        @endcan
        @can('taking_note_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.taking-notes.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/taking-notes') || request()->is('admin/taking-notes/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.takingNote.title') }}
                </a>
            </li>
        @endcan
        @can('periodic_session_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.periodic-sessions.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/periodic-sessions') || request()->is('admin/periodic-sessions/*') ? 'c-active' : '' }}">
                    <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.periodicSession.title') }}
                </a>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.systemCalendar') }}"
                class="c-sidebar-nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'c-active' : '' }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @can('outing_managment_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/outing-types*') ? 'c-show' : '' }} {{ request()->is('admin/outing-requests*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-outdent c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.outingManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('outing_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.outing-types.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/outing-types') || request()->is('admin/outing-types/*') ? 'c-active' : '' }}">
                                <i class="fa-fw far fa-grin c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.outingType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('outing_request_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.outing-requests.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/outing-requests') || request()->is('admin/outing-requests/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.outingRequest.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        {{-- //////////////////// --}}
        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-award c-sidebar-nav-icon">

                </i>

                {{ trans('cruds.bigBrotherRating.title') }}
            </a>
            <ul class="c-sidebar-nav-dropdown-items">

                @can('managers_ratting_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route('admin.managers-rattings.index') }}"
                            class="c-sidebar-nav-link {{ request()->is('admin/managers-rattings') || request()->is('admin/managers-rattings/*') ? 'c-active' : '' }}">
                            <i class="fa-fw far fa-star c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.managersRatting.title') }}
                        </a>
                    </li> 
                @endcan
                @can('big_brother_rating_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route('admin.big-brother-ratings.index') }}"
                            class="c-sidebar-nav-link {{ request()->is('admin/big-brother-ratings') || request()->is('admin/big-brother-ratings/*') ? 'c-active' : '' }}">
                            <i class="fa-fw far fa-star c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.bigBrotherRating.title1') }}
                        </a>
                    </li>
                @endcan
                @can('small_brother_rating_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route('admin.small-brother-ratings.index') }}"
                            class="c-sidebar-nav-link {{ request()->is('admin/big-brother-ratings') || request()->is('admin/big-brother-ratings/*') ? 'c-active' : '' }}">
                            <i class="fa-fw far fa-star c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.smallBrotherRating.title1') }}
                        </a>
                    </li>
                @endcan


            </ul>
        </li>


        {{-- //////////////////// --}}


        @can('inequality_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.inequalities.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/inequalities') || request()->is('admin/inequalities/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-not-equal c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.inequality.title') }}
                </a>
            </li>
        @endcan
        @can('general_setting_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/skills*') ? 'c-show' : '' }} {{ request()->is('admin/characteristics*') ? 'c-show' : '' }} {{ request()->is('admin/countries/*') ? 'c-show' : '' }} {{ request()->is('admin/cities/*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.generalSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('skill_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.skills.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/skills') || request()->is('admin/skills/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-award c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.skill.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('characteristic_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.characteristics.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/characteristics') || request()->is('admin/characteristics/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.characteristic.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('country_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.countries.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/countries') || request()->is('admin/countries/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.country.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('city_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.cities.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/cities') || request()->is('admin/cities/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.city.title') }}
                            </a>
                        </li>
                    @endcan
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route('admin.general-settings.index') }}"
                            class="c-sidebar-nav-link {{ request()->is('admin/general-settings') || request()->is('admin/general-settings/*') ? 'c-active' : '' }}">
                            <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.generalSettings.title') }}
                        </a>
                    </li>
                    @can('challengetype_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.challengetypes.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/challengetypes') || request()->is('admin/challengetypes/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-keyboard c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.challengetype.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/bigbrothe-reports*") ? "c-show" : "" }}">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-align-justify c-sidebar-nav-icon">

                </i>
               التقارير
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
             
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.bigbrothe-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bigbrothe-reports") || request()->is("admin/bigbrothe-reports/*") ? "c-active" : "" }}">
                            <i class="fa-fw far fa-address-book c-sidebar-nav-icon">

                            </i>
                         تقارير الأخ الأكبر
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.smallbrother-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/smallbrother-reports") || request()->is("admin/smallbrother-reports/*") ? "c-active" : "" }}">
                            <i class="fa-fw far fa-address-book c-sidebar-nav-icon">

                            </i>
                           تقارير الأخ الأصغر
                        </a>
                    </li>
            </ul>
        </li>
        @can('reporting_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/report-types*') ? 'c-show' : '' }} {{ request()->is('admin/reportings*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.reportingManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('report_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.report-types.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/report-types') || request()->is('admin/report-types/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('reporting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.reportings.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/reportings') || request()->is('admin/reportings/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reporting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.messenger.index') }}"
                class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'c-active' : '' }} c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                </i>
                <span>{{ trans('global.messages') }}</span>
                @if ($unread > 0)
                    <strong>( {{ $unread }} )</strong>
                @endif

            </a>
        </li>
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                        href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
