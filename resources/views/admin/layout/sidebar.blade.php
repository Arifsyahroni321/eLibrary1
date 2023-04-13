@php
    $page = Route::currentRouteName();
@endphp
<div class="sidebar-menu">
    <ul class="menu" style="margin-top: -5px">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ $page == 'adminDashboard' ? 'active' : '' }}">
            <a href="{{ route('adminDashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item  {{ $page == 'adminUser' ? 'active' : '' }}">
            <a href="{{ route('adminUser') }}" class='sidebar-link'>
                <i class="fas fa-book"></i>
                <span>Data Users</span>
            </a>
        </li>
    </ul>
</div>
</div>
</div>
