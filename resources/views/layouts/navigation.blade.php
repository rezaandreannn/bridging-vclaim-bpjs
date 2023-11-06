<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="http://192.168.2.253/emr//resource/doc/images/icon/logo.png" width="35" height="35"
                class="d-inline-block" alt="">
            <a href="index.html" class="ml-2">Vclaim RSUMM</a>

        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Vclaim</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Starter</li>
            <li class="{{ request()->is('dashboard*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('dashboard')}}"><i class="fas fa-fire"></i> <span>
                        Dashboard</span></a></li>
            <li class="menu-header">Menu</li>
            @can('monitoring')
            <li class="{{Request::is('peserta') ? 'active' : ''}}"><a class="nav-link" href="{{ route('peserta')}}"><i
                        class="fas fa-user"></i><span>Peserta</span></a></li>
            <li class="dropdown {{Request::is('rencana-kontrol*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-calendar-plus"></i>
                    <span>Rencana Kontrol</span></a>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('rencana-kontrol/kronis*') ? 'active' : ''}}"><a class="nav-link"
                            href="{{ route('rencana_kontrol.kronis.index')}}">Pasien Kronis</a></li>
                </ul>
            </li>
            @endcan
            @can('farmasi')
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tasks"></i>
                    <span>Referensi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Diagnosa</a></li>
                    <li><a class="nav-link" href="">Poli</a></li>
                    <li><a class="nav-link" href="layout-default.html">Fasilitas Kesehatan</a></li>
                    <li><a class="nav-link" href="layout-default.html">Dokter DPJP</a></li>
                    {{-- <li><a class="nav-link" href="layout-default.html"></a></li> --}}
                </ul>
            </li>
            @endcan
            @can('monitoring')
            <li class="menu-header">Monitoring</li>
            <li class="dropdown {{Request::is('monitoring*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-desktop"></i>
                    <span>Monitoring</span></a>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('monitoring/kunjungan*') ? 'active' : ''}}"><a class="nav-link"
                            href="{{ route('monitoring.kunjungan')}}">Kunjungan</a></li>
                    @can('farmasi')
                    <li><a class="nav-link" href="{{ route('rencana_kontrol.list')}}">Klaim</a></li>
                    <li><a class="nav-link" href="layout-default.html">Histori Peserta</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('farmasi')
            <li class="{{Request::is('peserta') ? 'active' : ''}}"><a class="nav-link" href="{{ route('peserta')}}"><i
                        class="fab fa-wpforms"></i><span>Lembar Pengajuan Klaim</span></a>

                {{-- <li class="dropdown {{ request()->is('rujukan*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-notes-medical"></i>
                    <span>Lembar Pengajuan Klaim</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('rujukan/list/rs*') ? 'active' : '' }}"><a class="nav-link" href="">List
                            Rujukan Rs</a></li>
                </ul>
            </li> --}}
            {{--
            <li class="dropdown {{ request()->is('sep*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-medical-alt"></i>
                <span>SEP</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('sep/history*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('sep.history')}}">History</a></li>
            </ul>
            </li> --}}
            @endcan

            <li class="menu-header">Manage User</li>
            <li class="dropdown {{ request()->is('super-admin*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>Manage user</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('super-admin/role*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.role.index')}}">Role</a></li>
                    <li class="{{ request()->is('super-admin/permission*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.permission.index')}}">Permission</a></li>
                    <li class="{{ request()->is('super-admin/user*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.user.index')}}">User</a></li>
                    <li class="{{ request()->is('super-admin/role-permission*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.role-permission.index')}}">Role Has Permission</a></li>
                </ul>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('dokumentasi')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-book"></i> dokumentasi
            </a>
        </div>
    </aside>
</div>
