<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h4>Detail Peserta </h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Peserta</a></div>
                <div class="breadcrumb-item active"><a href="#">Detail</a></div>
            </div>
        </div>

        {{-- <div class="row mx-4 my-5">
            <div class="col-12 col-sm-4 col-lg-2 mb-sm-3 mr-4 bg-white shadow">
                <div class="p-3">
                    <div class="card-body">
                        <center><img src="{{ asset('img/avatar.png') }}"
        class="pb-4 rounded-circle justify-items-center container" style="width:80%" alt="">
        </center>
        <p class="text-center"><b>Joko Andrian Saputra</b> <br>18070000000001</p>
        </div>
        </div>
        </div>
        <div class="col-sm mb-sm-3 shadow bg-white bg-white shadow">
            <div class="p-3">
                <div>
                    <div>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <td scope="col-sm"><b>NO BPJS</b><br>00003453768</td>
                                    <td scope="col-sm"><b>NO MR (RSUMM)</b><br>123456</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col-sm"><b>ALAMAT</b><br>Desa Kayangan Mboh ra Roh</td>
                                    <td scope="col-sm"><b>JENIS KELAMIN</b><br>LAKI - LAKI</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td scope="col-sm"><b>TANGGAL LAHIR</b><br>12-12-1980</td>
                                    <td scope="col-sm"><b>NO HP</b><br>081547895412</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div> --}}

        @if ($peserta != null)
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" width="70" src="{{ asset('img/avatar.png') }}">
                                <div class="media-body">
                                    <div class="media-right">
                                        <div class="btn btn-primary">
                                            {{ $peserta['statusPeserta']['keterangan']}}</div>
                                    </div>
                                    <div class="media-title mb-1">{{ $peserta['nama']}}</div>
                                    <div class="text-time">{{$peserta['noKartu']}}</div>
                                    <div class="media-description text-muted">
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
                                            <div class="col-4">Jenis Kelamin</div>
                                            <div class="col-8">: {{$peserta['sex'] == 'L' ? 'Laki-laki' : 'Perempuan'}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Jenis Peserta</div>
                                            <div class="col-8">: {{$peserta['jenisPeserta']['keterangan']}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Hak Kelas</div>
                                            <div class="col-8">: {{$peserta['hakKelas']['keterangan']}}</div>
                                        </div>
                                    </div>
                                    {{-- <div class="media-links">
                                        <a href="#">View</a>
                                        <div class="bullet"></div>
                                        <a href="#">Edit</a>
                                        <div class="bullet"></div>
                                        <a href="#" class="text-danger">Trash</a>
                                    </div> --}}
                                </div>
                            </li>
                    </div>
                </div>
            </div>
        </div>
        @endif



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 id="tabTitle">Data Aktif Saat Ini</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Rujukan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">Rencana Kontrol</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No SEP</th>
                                                        <th>Tanggal</th>
                                                        <th>Poli</th>
                                                        <th>Diagnosa</th>
                                                        <th>No Rujukan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($histories as $history)
                                                    <tr>
                                                        <td>{{ $history['noSep']}} </td>
                                                        <td>{{ $history['tglSep']}}</td>
                                                        <td title="{{ $history['poli']}}">
                                                            {{ $history['poliTujSep']}}
                                                        </td>
                                                        <td title="{{ explode(' - ', $history['diagnosa'])[1] }}">
                                                            {{ explode(' - ', $history['diagnosa'])[0] }}
                                                        </td>
                                                        <td>{{ $history['noRujukan']}}</td>
                                                        <td>
                                                            <a href="{{ route('sep.print', $history['noSep'] )}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Print" id="printButton"><i class="fas fa-print"></i></a>
                                                            <a href="#" class="btn btn-danger btn-action" data-toggle="modal" data-target="#deleteConfirmationHistory" data-href="{{ route('sep.delete', $history['noSep']) }}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No Rujukan</th>
                                                        <th>Tanggal</th>
                                                        <th>Expired</th>
                                                        <th>Poli</th>
                                                        <th>Diagnosa</th>
                                                        <th>Pelayanan</th>
                                                        <th>Prov Perujuk</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($rujukans as $rujukan)
                                                    <tr>
                                                        <td>{{ $rujukan['noKunjungan']}} </td>
                                                        <td>{{ $rujukan['tglKunjungan']}}</td>
                                                        <td>{{ $rujukan['expiredDate']}}</td>
                                                        <td title="{{ $rujukan['poliRujukan']['nama']}}">
                                                            {{ $rujukan['poliRujukan']['kode']}}</td>
                                                        <td title="{{ $rujukan['diagnosa']['nama']}}">
                                                            {{ $rujukan['diagnosa']['kode']}}</td>
                                                        <td>{{ $rujukan['pelayanan']['nama']}}</td>
                                                        <td>
                                                            {{ $rujukan['provPerujuk']['nama']}}
                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No Surat</th>
                                                        <th>Jenis Surat</th>
                                                        <th>Tgl Terbit</th>
                                                        <th>Tgl SEP</th>
                                                        <th>Kode DPJP</th>
                                                        <th>Pelayanan</th>
                                                        <th>Terbit SEP</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($suratKontrols as $suratKontrol)
                                                    <tr>
                                                        <td>{{ $suratKontrol['noSuratKontrol']}} </td>
                                                        <td>{{ $suratKontrol['namaJnsKontrol']}}</td>
                                                        <td>{{ $suratKontrol['tglTerbitKontrol']}}</td>
                                                        <td title="{{ $suratKontrol['noSepAsalKontrol']}}">
                                                            {{ $suratKontrol['tglSEP']}}</td>
                                                        <td title="{{ $suratKontrol['namaDokter']}}">
                                                            {{ $suratKontrol['kodeDokter']}}</td>
                                                        <td>{{ $suratKontrol['jnsPelayanan']}}</td>
                                                        <td>
                                                            {{ $suratKontrol['terbitSEP']}}
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="#" class="btn btn-danger btn-action" data-toggle="modal" data-target="#deleteConfirmation" data-href="{{ route('rencana_kontrol.delete', $suratKontrol['noSuratKontrol']) }}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a id="deleteButton" class="btn btn-danger" href="#">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmationHistory" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a id="deleteButtonHistory" class="btn btn-danger" href="#">Hapus</a>
                </div>
            </div>
        </div>
    </div>










    {{-- css library --}}
    @push('css-libraries')
    <style>
        table.table td {
            font-size: 12px;
        }

        table.table th {
            font-size: 13px;
        }

    </style>
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
        $('#deleteConfirmation').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var deleteURL = button.data('href');
            $('#deleteButton').attr('href', deleteURL);
        });

        $('#deleteConfirmationHistory').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var deleteURL = button.data('href');
            $('#deleteButtonHistory').attr('href', deleteURL);
        });

    </script>




    @include('sweetalert::alert')
    @endpush
    </x-main-layout>
