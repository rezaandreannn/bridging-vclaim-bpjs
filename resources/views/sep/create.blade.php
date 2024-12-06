<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h4>Tambah Data SEP</h4>
            <div class="section-header-breadcrumb">
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" width="70" src="{{ asset('img/avatar.png') }}">
                                <div class="media-body">
                                    <div class="media-title mb-1">{{ $peserta['nama']}}</div>
                                    <div class="text-time">{{$peserta['noKartu']}}</div>
                                </div>
                            </li>
                    </div>
                    <div class="card-footer" style="font-size: 10px; margin-top: -30px;">
                        <div class="row">
                            <div class="col-4">NIK</div>
                            <div class="col-8">: {{$peserta['nik']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">No MR</div>
                            <div class="col-8">: {{$peserta['mr']['noMR']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">No Telepon</div>
                            <div class="col-8">: {{$peserta['mr']['noTelepon']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Tgl Lahir</div>
                            <div class="col-8">: {{$peserta['tglLahir']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Jns Kelamin</div>
                            <div class="col-8">: {{$peserta['sex'] == 'L' ? 'Laki-laki' : 'Perempuan'}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">Jns Peserta</div>
                            <div class="col-8">: {{$peserta['jenisPeserta']['keterangan']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Hak Kelas</div>
                            <div class="col-8">: {{$peserta['hakKelas']['keterangan']}}</div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: -20px;">
                    <div class="card-body">
                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur.
                            </div>
                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui.
                            </div>
                            <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Buat SEP</h4>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Kartu</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_poli" value="{{ $peserta['noKartu']}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Pelayanan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="no_sep" id="noSepSelect">
                                        <option value="2">Rawat Jalan</option>
                                        <option value="1">Rawat Jalan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No MR</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_poli" value="{{ $peserta['mr']['noMR']}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hak Kelas</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_poli" value="{{ $peserta['hakKelas']['kode']}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Rujukan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="no_sep" id="noSepSelect">
                                        <option value="2">Rawat Jalan</option>
                                        <option value="1">Rawat Jalan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih rujukan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_dokter" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                {{-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama dokter</label> --}}
                                <div class="col-sm-12 col-md-7">
                                    <input type="hidden" class="form-control" name="nama_peserta" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </section>

    {{-- css library --}}
    @push('css-libraries')

    <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}" />
    @endpush

    @push('js-libraries')
    <script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('stisla/assets/js/page/modules-datatables.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#noSepSelect').change(function() {
                var selectedNoSep = $(this).val();


                $.ajax({
                    type: 'POST'
                    , url: "{{ route('rencana_kontrol.fetchSep') }}"
                    , data: {
                        '_token': '{{ csrf_token() }}'
                        , 'no_sep': selectedNoSep
                    }
                    , success: function(response) {

                        // Update the readonly fields with the data from the response
                        $('[name="nama_poli"]').val(response.nama_poli);
                        $('[name="nama_dokter"]').val(response.nama_dokter);
                        $('[name="kode_dokter"]').val(response.kode_dokter);
                        $('[name="nama_peserta"]').val(response.nama_peserta);

                        var currentDate = new Date();
                        currentDate.setDate(currentDate.getDate() + 31);

                        // Format the date as YYYY-MM-DD (assuming you want that format)
                        var formattedDate = currentDate.toISOString().split('T')[0];

                        // Update the "Tgl Rencana Kontrol" input field
                        $('[name="tgl_rencana_kontrol"]').val(formattedDate);
                    }
                    , error: function(data) {
                        console.log(data);
                    }
                });
            });
        });

    </script>

    @endpush
    </x-main-layout>
