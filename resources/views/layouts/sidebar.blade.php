<aside class="main-sidebar sidebar-light-danger elevation-4">
    <a href="{{ route('home') }}" class="brand-link bg-danger">
        <img src="{{ asset('img/logo-2.jpeg') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(Auth::user()->staff->photo ?? 'img/user.jpg') }}" class="img-circle elevation-2" alt="User Image" style="width: 35px; height: 35px;">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ ucwords(Auth::user()->staff->name ?? Auth::user()->name) }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ $page == 'home'|| $page == '' ? 'active' : '' }}">
                    <i class="nav-icon fa fa-tachometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (!Auth::user()->hasRole('karyawan'))
                <li class="nav-item has-treeview {{ $page == 'master' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $page == 'master' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-laptop"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('master.position.index') }}" class="nav-link {{ $sub == 'position' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-circle-o"></i>
                                <p>Position</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('master.departement.index') }}" class="nav-link {{ $sub == 'departement' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-circle-o"></i>
                                <p>Departement</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('master.staff.index') }}" class="nav-link {{ $sub == 'staff' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-circle-o"></i>
                                <p>Staff</p>
                            </a>
                        </li>
                    </ul>
                </li>
               
                {{-- <li class="nav-item">
                    <a href="{{ route('overtime.index') }}" class="nav-link {{ $page == 'overtime' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-clock"></i>
                        <p>Overtime</p>
                    </a>
                </li> --}}
                @endif

                <li class="nav-item">
                    <a href="{{ route('schedule.index') }}" class="nav-link {{ $page == 'schedule' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Schedule</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cuti.index') }}" class="nav-link {{ $page == 'cuti' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Permohonan Cuti</p>
                    </a>
                </li>
                @if (Auth::user()->hasRole('admin'))
                    <li class="nav-item">
                        <a href="{{ route('salary.index') }}" class="nav-link {{ $page == 'salary' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-money"></i>
                            <p>Penggajian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('absensi.index') }}" class="nav-link {{ $page == 'absensi' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Absensi</p>
                        </a>
                    </li>
               
                    <li class="nav-header">Special Menu</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ $page == 'users' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-circle-o"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link {{ $page == 'roles' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>Role</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fa fa-sign-out"></i>
                            <p>Logout</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>