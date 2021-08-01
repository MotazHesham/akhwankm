<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }} {{ request()->is("admin/small-brothers*") ? "c-show" : "" }} {{ request()->is("admin/big-brothers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('small_brother_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.small-brothers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/small-brothers") || request()->is("admin/small-brothers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-child c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.smallBrother.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('big_brother_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.big-brothers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/big-brothers") || request()->is("admin/big-brothers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-male c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.bigBrother.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('approvement_form_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.approvement-forms.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/approvement-forms") || request()->is("admin/approvement-forms/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-check-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.approvementForm.title') }}
                </a>
            </li>
        @endcan
        @can('brothers_deal_form_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.brothers-deal-forms.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/brothers-deal-forms") || request()->is("admin/brothers-deal-forms/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-handshake c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.brothersDealForm.title') }}
                </a>
            </li>
        @endcan
        @can('outing_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/outing-types*") ? "c-show" : "" }} {{ request()->is("admin/outing-requests*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-outdent c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.outingManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('outing_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.outing-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/outing-types") || request()->is("admin/outing-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-grin c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.outingType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('outing_request_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.outing-requests.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/outing-requests") || request()->is("admin/outing-requests/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.outingRequest.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('general_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/skills*") ? "c-show" : "" }} {{ request()->is("admin/characteristics*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.generalSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('skill_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.skills.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/skills") || request()->is("admin/skills/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-award c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.skill.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('characteristic_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.characteristics.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/characteristics") || request()->is("admin/characteristics/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.characteristic.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>