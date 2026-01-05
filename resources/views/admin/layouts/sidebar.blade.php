<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">

        {{-- HEADER --}}
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('assets-admin/images/logo/logo.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- MENU --}}
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-title">Menu Utama</li>

                <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.project.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.project.index') }}" class="sidebar-link">
                        <i class="bi bi-briefcase-fill"></i>
                        <span>Monitoring Project</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.tasks.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.tasks.index') }}" class="sidebar-link">
                        <i class="bi bi-list-task"></i>
                        <span>Task</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.sidang-schedules.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.sidang-schedules.index') }}" class="sidebar-link">
                        <i class="bi bi-calendar-event-fill"></i>
                        <span>Jadwal Sidang</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.assessments.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.assessments.index') }}" class="sidebar-link">
                        <i class="bi bi-clipboard-check-fill"></i>
                        <span>Assessment</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.progress-logs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.progress-logs.index') }}" class="sidebar-link">
                        <i class="bi bi-graph-up"></i>
                        <span>Progress Log</span>
                    </a>
                </li>

                @role('admin')
                    <li class="sidebar-title">Administrator</li>

                    <li class="sidebar-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.categories.index') }}" class="sidebar-link">
                            <i class="bi bi-tags-fill"></i>
                            <span>Kategori</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="sidebar-link">
                            <i class="bi bi-people-fill"></i>
                            <span>Manajemen User</span>
                        </a>
                    </li>
                @endrole

                <li class="sidebar-title">Akun</li>

                    {{-- PROFILE --}}
                    <li class="sidebar-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        <a href="{{ route('profile.edit') }}" class="sidebar-link">
                            <i class="bi bi-person-circle"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                    {{-- LOGOUT --}}
                    <li class="sidebar-item">
                        <a href="#"
                        class="sidebar-link text-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>


            </ul>
        </div>

    </div>
</div>
