<?php
use App\Models\BigBrother;
use App\Models\SmallBrother;

 $user_id=BigBrother::where('user_id',Auth::id())->first()->id;
?>

<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" style="background: rgb(143, 43, 43)">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("bigbrother.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route("bigbrother.home") }}" class="c-sidebar-nav-link">
                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                </i>
                {{ trans('global.personality_analysis') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route("bigbrother.home") }}" class="c-sidebar-nav-link">
                <i class="fa-fw far fa-clock c-sidebar-nav-icon">

                </i>
                {{ trans('global.sessionsAppointments') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route('bigbrother.brothers-deal-forms.view', $user_id) }}" class="c-sidebar-nav-link">
                 <i class="fa-fw fas fa-handshake c-sidebar-nav-icon">

                </i>
                {{ trans('global.BrothersDealForm') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route('bigbrother.BrothersPromiseForm.view', $user_id) }}" class="c-sidebar-nav-link">
                <i class="fa-fw fas fa-handshake c-sidebar-nav-icon">

                </i>
                {{ trans('global.BrothersPromiseForm') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route("bigbrother.outing-requests.index") }}" class="c-sidebar-nav-link ">
                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.outingRequest.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route('bigbrother.big-brothers.edit', $user_id) }}"class="c-sidebar-nav-link">
            <i class="c-sidebar-nav-icon 	fas fa-edit">

            </i>
            {{ trans('global.update_info') }}
        </a>
    </li>


    <li class="c-sidebar-nav-item">
        <a href="{{ route('bigbrother.brotherhood.show', $user_id) }}"class="c-sidebar-nav-link">
        <i class="c-sidebar-nav-icon 	fas fa-edit">

        </i>
        {{ trans('global.smallbrotherinfo') }}
    </a>
</li>








        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
