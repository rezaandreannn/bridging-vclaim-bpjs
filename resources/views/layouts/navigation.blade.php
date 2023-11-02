<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="http://192.168.2.253/emr//resource/doc/images/icon/logo.png" width="35" height="35" class="d-inline-block" alt="">
            <a href="index.html" class="ml-2">Vclaim RSUMM</a>

        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Vclaim</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Starter</li>
            <li class="{{ request()->is('dashboard*') ? 'active' : '' }}"><a class="nav-link" href=""><i class="fas fa-fire"></i> <span>
                        Dashboard</span></a></li>
            <li class="{{Request::is('peserta') ? 'active' : ''}}"><a class="nav-link" href=""><i class="fas fa-user"></i><span>Peserta</span></a>

            <li class="menu-header">Menu</li>



            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-notes-medical"></i>
                    <span>Rencana Kontrol</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('rencana_kontrol.list')}}">List</a></li>
                    <li><a class="nav-link" href="layout-default.html">SKDP</a></li>
                    {{-- <li><a class="nav-link" href="layout-default.html">SPRI</a></li> --}}
                </ul>
            </li>

            <li class="dropdown {{ request()->is('rujukan*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-notes-medical"></i>
                    <span>Rujukan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('rujukan/list*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('rujukan.list')}}">List Rujukan Pcare</a></li>
                    <li class="{{ request()->is('rujukan/list/rs*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('rujukan.list.rs')}}">List Rujukan Rs</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->is('sep*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-medical-alt"></i>
                    <span>SEP</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('sep/history*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('sep.history')}}">History</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->is('super-admin*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-medical-alt"></i>
                    <span>Manajemen user</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('super-admin/role*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.role.index')}}">Role</a></li>
                    <li class="{{ request()->is('super-admin/permission*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.permission.index')}}">Permission</a></li>
                </ul>
            </li>








        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('back.verify')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Kembali
            </a>
        </div>
    </aside>
</div>
