@php
    $general_settings = \App\Models\GeneralSettings::select('small_brother_color')->first();
@endphp

<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show"
    style="background: {{ $general_settings->small_brother_color ?? '' }}">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('smallbrother.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('smallbrother.chatting.index') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fab fa-fw fa-facebook-messenger">

                </i>
                {{ trans('global.chatting') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('smallbrother.brotherhood.show') }}" class="c-sidebar-nav-link">
                <i class="fa-fw fas fa-handshake c-sidebar-nav-icon">

                </i>
                {{ trans('global.brotherhood') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route('smallbrother.outingRequest') }}" class="c-sidebar-nav-link">
                <i class="fa-fw far fa-grin c-sidebar-nav-icon">

                </i>
                {{ trans('global.outingRequests') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route('smallbrother.calender') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("smallbrother.inequalities.create") }}" class="c-sidebar-nav-link {{ request()->is("admin/inequalities") || request()->is("admin/inequalities/*") ? "c-active" : "" }}">
                <i class="fa-fw fas fa-not-equal c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.inequality.title') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("smallbrother.small-brother-ratings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/small-brother-ratings") || request()->is("admin/small-brother-ratings/*") ? "c-active" : "" }}">
                <i class="fa-fw far fa-star c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.smallBrotherRating.title') }}
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
