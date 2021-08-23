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
            <a href="{{ route('specialist.brothers') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-handshake">

                </i> 
                {{ trans('global.brothers') }}
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
