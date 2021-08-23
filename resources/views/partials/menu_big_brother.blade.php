@php
    $general_settings = \App\Models\GeneralSettings::select('big_brother_color')->first();
@endphp

<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" style="background: {{ $general_settings->big_brother_color ?? '' }}">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('bigbrother.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        {{-- 
        <li class="c-sidebar-nav-item">
            <a href="{{ route('bigbrother.home') }}" class="c-sidebar-nav-link">
                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                </i>
                {{ trans('global.personality_analysis') }}
            </a>
        </li> --}} 
        <li class="c-sidebar-nav-item">
            <a href="{{ route('bigbrother.calender') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route('bigbrother.brothers-deal-forms.view') }}" class="c-sidebar-nav-link">
                <i class="fa-fw fas fa-handshake c-sidebar-nav-icon">

                </i>
                {{ trans('global.BrothersDealForm') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route('bigbrother.BrothersPromiseForm.view') }}" class="c-sidebar-nav-link">
                <i class="fa-fw fas fa-handshake c-sidebar-nav-icon">

                </i>
                {{ trans('global.BrothersPromiseForm') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route('bigbrother.outing-requests.index') }}" class="c-sidebar-nav-link ">
                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.outingRequest.title') }}
            </a>
        </li> 
        
        <li class="c-sidebar-nav-item">
            <a href="{{ route('bigbrother.brotherhood.show') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon  fas fa-user">

                </i>
                {{ trans('global.smallbrotherinfo') }}
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
