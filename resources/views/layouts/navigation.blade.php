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
            <li class="{{ request()->is('dashboard*') ? 'active' : '' }}"><a class="nav-link" href=""><i
                        class="fas fa-fire"></i> <span>
                        Dashboard</span></a></li>
            {{-- <li class="{{Request::is('peserta') ? 'active' : ''}}"><a class="nav-link" href=""><i
                    class="fas fa-user"></i><span>Peserta</span></a> --}}

            <li class="menu-header">Menu</li>

            {{-- <li class="nav-item dropdown  {{ request()->is('nurse*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-nurse"></i>
                <span>Peserta</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('nurse/rj*') ? 'active' : '' }}"><a
                        class="{{ request()->is('nurse/rj*') ? 'beep beep-sidebar' : '' }}" href="">Data Peserta</a>
                </li>
            </ul>
            </li> --}}

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-notes-medical"></i>
                    <span>Rencana Kontrol</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('rencana_kontrol.sep')}}">SEP</a></li>
                    <li><a class="nav-link" href="layout-default.html">Cari No Surat Kontrol</a></li>
                    <li><a class="nav-link" href="layout-default.html">Data Surat Kontrol</a></li>
                </ul>
            </li>

            <li class="dropdown {{ request()->is('rj*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-stethoscope"></i>
                    <span>Rujukan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('rj/medis*') ? 'active' : '' }}"><a class="nav-link" href="">By Nomor
                            Rujukan</a></li>
                </ul>
            </li>








        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Docs
            </a>
        </div>
    </aside>
</div>
