@php
$general_settings = \App\Models\GeneralSettings::select('specialist_color')->first();
@endphp

<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show"
    style="background: {{ $general_settings->specialist_color ?? '' }}">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('specialist.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('specialist.chatting.index') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fab fa-fw fa-facebook-messenger">

                </i>
                {{ trans('global.chatting') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('specialist.brothers') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-handshake">

                </i> 
                {{ trans('global.brothers') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('specialist.outing-requests.index') }}" class="c-sidebar-nav-link ">
                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.outingRequest.title') }}
            </a>
        </li> 
        <li class="c-sidebar-nav-item">
            <a href="{{ route("specialist.inequalities.index") }}" class="c-sidebar-nav-link" >
                <i class="fa-fw fas fa-not-equal c-sidebar-nav-icon">

                </i>
                
                {{ trans('cruds.inequality.title') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("specialist.reportings.index") }}" class="c-sidebar-nav-link ">
                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.reporting.title') }}
            </a>
        </li>
                   <li class="c-sidebar-nav-item">
                <a href="{{ route("specialist.follow-ups.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/follow-ups") || request()->is("admin/follow-ups/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-th-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.followUp.title') }}
                </a>
            </li>
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
