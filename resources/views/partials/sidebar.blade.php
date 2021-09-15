<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> {{ __('Dashboard') }}</a></li>

        @if (auth()->user()->is_admin)

            <li class="c-sidebar-nav-title">{{ __('Admin') }}</li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link"
                    href="{{ route('admin.pages.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                    </svg> {{ __('Pages') }}</a>

            </li>

        @endif

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"
                href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg> {{ __('Base') }}</a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg>{{ __('Logout') }}</a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>


    </ul>
    </li>

    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
