<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        {{-- jika login bukan dokter --}}

        <div class="card" style="margin-top: -20px;">
            <div class="card-body">
                <form action="" method="get" id="filter-form">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 p-1">
                            <div class="form-group mb-0">
                                <label>Dokter</label>
                                <select class="form-control select2" name="dokter" id="dokter" autofocus>
                                    <option value="" selected>-- Semua dokter --</option>
                                    {{-- @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->dokter_code }}"
                                    {{ request('dokter') == $dokter->dokter_code ? 'selected' : ''}}>
                                    {{ $dokter->dokter_name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="col- col-sm-3  p-1">
                            <div class="form-group mt-4 mb-0">
                                <button class="btn btn-primary mt-2 mb-0" type="submit">
                                    Submit
                                </button>
                                <button class="btn btn-danger mt-2 mb-0" type="submit" name="reset" id="reset-button">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- jika login bukan dokter --}}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pasien Masuk</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-list-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Assesmen Perawat</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-list-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Assesmen Dokter</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-check-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Selesai</h4>
                        </div>
                        <div class="card-body">
                            0
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="card card-danger">
            <div class="card-header">
                <h4>Users</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-danger btn-icon icon-right">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="owl-carousel owl-theme" id="users-carousel">
                    <div>
                        <div class="user-item">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="img-fluid">
                            <div class="user-details">
                                <div class="user-name">Hasan Basri</div>
                                <div class="text-job text-muted">Web Developer</div>
                                <div class="user-cta">
                                    <button class="btn btn-primary follow-btn" data-follow-action="alert('user1 followed');" data-unfollow-action="alert('user1 unfollowed');">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="user-item">
                            <img alt="image" src="assets/img/avatar/avatar-2.png" class="img-fluid">
                            <div class="user-details">
                                <div class="user-name">Kusnaedi</div>
                                <div class="text-job text-muted">Mobile Developer</div>
                                <div class="user-cta">
                                    <button class="btn btn-primary follow-btn" data-follow-action="alert('user2 followed');" data-unfollow-action="alert('user2 unfollowed');">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="user-item">
                            <img alt="image" src="assets/img/avatar/avatar-3.png" class="img-fluid">
                            <div class="user-details">
                                <div class="user-name">Bagus Dwi Cahya</div>
                                <div class="text-job text-muted">UI Designer</div>
                                <div class="user-cta">
                                    <button class="btn btn-danger following-btn" data-unfollow-action="alert('user3 unfollowed');" data-follow-action="alert('user3 followed');">Following</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="user-item">
                            <img alt="image" src="assets/img/avatar/avatar-4.png" class="img-fluid">
                            <div class="user-details">
                                <div class="user-name">Wildan Ahdian</div>
                                <div class="text-job text-muted">Project Manager</div>
                                <div class="user-cta">
                                    <button class="btn btn-primary follow-btn" data-follow-action="alert('user4 followed');" data-unfollow-action="alert('user4 unfollowed');">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="user-item">
                            <img alt="image" src="assets/img/avatar/avatar-5.png" class="img-fluid">
                            <div class="user-details">
                                <div class="user-name">Deden Febriansyah</div>
                                <div class="text-job text-muted">IT Support</div>
                                <div class="user-cta">
                                    <button class="btn btn-primary follow-btn" data-follow-action="alert('user5 followed');" data-unfollow-action="alert('user5 unfollowed');">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>

    {{-- css library --}}
    @push('css-libraries')
    {{-- <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    --}}
    <link rel="stylesheet"
        href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}" />
    @endpush

    @push('js-libraries')
    {{-- <script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script> --}}
    <script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    @endpush
</x-app-layout>
