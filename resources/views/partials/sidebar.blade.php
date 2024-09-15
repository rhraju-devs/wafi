<div class="sidebar-menu">
    <span class="sidebar-menu__close"><i class="las la-times"></i></span>
    <div class="logo-wrapper px-3">
        <a href="{{ route('user.dashboard') }}" class="normal-logo" id="normal-logo">
            <img src="{{ siteLogo() }}" alt="@lang('img')"></a>
    </div>

    <ul class="sidebar-menu-list">
        <li class="sidebar-menu-list__item">
            <a href="{{ route('user.dashboard') }}" class="sidebar-menu-list__link {{ Route::is('user.dashboard') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-gauge"></i></span>
                <span class="text">@lang('Dashboard')</span>
            </a>
        </li>

        <li class="sidebar-menu-list__item">
            <a href="{{ route('user.employee.list') }}" class="sidebar-menu-list__link {{ Route::is('user.employee.list') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-users fa-fw"></i></span>
                <span class="text">@lang('Employee List')</span>
            </a>
        </li>

        <li class="sidebar-menu-list__item">
            <a href="{{ route('user.employee.create') }}" class="sidebar-menu-list__link {{ Route::is('user.employee.create') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-user-plus fa-fw"></i></span>
                <span class="text">@lang('Add Employee')</span>
            </a>
        </li>

        <li class="sidebar-menu-list__item">
            <a href="{{ route('user.logout') }}" class="sidebar-menu-list__link">
                <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                <span class="text">@lang('Sign Out')</span>
            </a>
        </li>


    </ul>
</div>
<!-- side bar -->
