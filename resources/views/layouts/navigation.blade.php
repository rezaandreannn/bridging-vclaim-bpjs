<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="http://192.168.2.253/emr//resource/doc/images/icon/logo.png" width="35" height="35" class="d-inline-block" alt="">
            <a href="/" class="ml-2">Vclaim RSUMM</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Vclaim</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Starter</li>
            <li class="{{ request()->is('dashboard*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard')}}"><i class="fas fa-fire"></i> <span>
                        Dashboard</span></a></li>
            @can('menu')
            <li class="menu-header">Menu</li>
            @endcan
            @can('peserta')
            <li class="dropdown {{Request::is('peserta*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-injured"></i>
                    <span>Peserta</span></a>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('peserta/2*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('peserta', ['param' => '2']) }}">Rawat Jalan</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('peserta/1*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('peserta', ['param' => '1']) }}">Rawat Inap</a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('cetak sep')
            <li class="{{Request::is('cetaksep') ? 'active' : ''}}"><a class="nav-link" href="{{ route('cetaksep.verify')}}"><i class="fas fa-user"></i><span>Cetak SEP Petugas</span></a>
            </li>
            @endcan
            @can('sep')
            <li class="dropdown {{Request::is('sep*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-newspaper"></i>
                    <span>SEP</span></a>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('sep/finger*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('sep.finger')}}">Finger Peserta</a></li>
                    <li class=""><a class="nav-link" href="{{ route('sep.create', 1)}}">Buat SEP</a></li>
                    <li class="{{Request::is('sep/by-anjungan*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('sep.by.anjungan')}}">SEP By Anjungan</a></li>
                    <li class="{{Request::is('rencana-kontrol/kronis*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('rencana_kontrol.kronis.index')}}">Aproval Pengajuan SEP</a></li>
                    <li class="{{Request::is('rencana-kontrol/kronis*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('rencana_kontrol.kronis.index')}}">List Data Persetujuan SEP</a></li>
                    <li class="{{Request::is('rencana-kontrol/kronis*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('rencana_kontrol.kronis.index')}}">Update Tanggal Pulang</a></li>
                </ul>
            </li>
            @endcan
            @can('rencana kontrol')
            <li class="dropdown {{Request::is('rencana-kontrol*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-calendar-plus"></i>
                    <span>Rencana Kontrol</span></a>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('rencana-kontrol/kronis*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('rencana_kontrol.kronis.index')}}">Pasien Kronis</a></li>
                </ul>
            </li>
            @endcan
            @can('referensi')
            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tasks"></i>
                    <span>Referensi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Diagnosa</a></li>
                    <li><a class="nav-link" href="">Poli</a></li>
                    <li><a class="nav-link" href="layout-default.html">Fasilitas Kesehatan</a></li>
                    <li><a class="nav-link" href="layout-default.html">Dokter DPJP</a></li>
                    <li><a class="nav-link" href="layout-default.html"></a></li>
                </ul>
            </li> --}}
            @endcan
            @can('bridging')
            <li class="dropdown {{Request::is('bridging*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                    <span>Bridging</span></a>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('bridging/dokter*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('bridging.dokter.index')}}">Dokter</a></li>
                </ul>
            </li>
            @endcan
            @can('monitoring')
            <li class="menu-header">Monitoring</li>
            <li class="dropdown {{Request::is('monitoring*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-desktop"></i>
                    <span>Monitoring</span></a>
                <ul class="dropdown-menu">
                    <li class="{{Request::is('monitoring/kunjungan*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('monitoring.kunjungan')}}">Kunjungan</a></li>
                    {{-- <li><a class="nav-link" href="{{ route('rencana_kontrol.list')}}">Klaim</a>
            </li>
            <li><a class="nav-link" href="layout-default.html">Histori Peserta</a></li> --}}
        </ul>
        </li>
        @endcan
        @can('lembar pengajuan klaim')
        <li class="{{Request::is('lpk*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('lpk.index')}}"><i class="fab fa-wpforms"></i><span>Lembar Pengajuan Klaim</span></a>
            @endcan
            @can('manage user')
        <li class="menu-header">Manage User</li>
        <li class="dropdown {{ request()->is('super-admin*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                <span>Manage user</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('super-admin/role*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.role.index')}}">Role</a></li>
                <li class="{{ request()->is('super-admin/permission*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.permission.index')}}">Permission</a></li>
                <li class="{{ request()->is('super-admin/user*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.user.index')}}">User</a></li>
                <li class="{{ request()->is('super-admin/role-permission*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.role-permission.index')}}">Role Has Permission</a></li>
            </ul>
        </li>
        <li class=""><a class="nav-link" href=""> <i class="fas fa-user-circle"></i><span>Profil</span></a>
            @endcan

            {{-- @can('monitoring') --}}
            {{-- <li class="menu-header">General</li>
        <li class=""><a class="nav-link" href=""><i class="fas fa-cogs"></i><span>Pengaturan</span></a>
        <li class=""><a class="nav-link" href=""><i class="fab fa-wpforms"></i><span>Pengaturan</span></a>
            @endcan
            </ul>
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="{{ route('dokumentasi')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-route"></i> Routing
            </a>
</div> --}}
</aside>
</div>
