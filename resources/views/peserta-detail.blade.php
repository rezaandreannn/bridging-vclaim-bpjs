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

        <div class="row mx-4 my-5">
            <div class="col-12 col-sm-4 col-lg-2 mb-sm-3 mr-4 bg-white shadow">
            <div class="p-3">
                <div class="card-body">                
                    <center><img src="{{ asset('img/avatar.png') }}" class="pb-4 rounded-circle justify-items-center container" style="width:80%" alt=""></center>
                <p class="text-center"><b>Joko Andrian Saputra</b> <br>18070000000001</p>
                </div>
            </div>
            </div>
            <div class="col-sm mb-sm-3 shadow bg-white">
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
        </div>
 
        

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
                                                        <td title="{{ $history['poli']}}">{{ $history['poliTujSep']}}</td>
                                                        <td title="{{ explode(' - ', $history['diagnosa'])[1] }}">
                                                            {{ explode(' - ', $history['diagnosa'])[0] }}
                                                        </td>
                                                        <td>{{ $history['noRujukan']}}</td>
                                                        <td>
                                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-print"></i></a>
                                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
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
                                                        <td title="{{ $rujukan['poliRujukan']['nama']}}">{{ $rujukan['poliRujukan']['kode']}}</td>
                                                        <td title="{{ $rujukan['diagnosa']['nama']}}">{{ $rujukan['diagnosa']['kode']}}</td>
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
                                                        <td title="{{ $suratKontrol['noSepAsalKontrol']}}">{{ $suratKontrol['tglSEP']}}</td>
                                                        <td title="{{ $suratKontrol['namaDokter']}}">{{ $suratKontrol['kodeDokter']}}</td>
                                                        <td>{{ $suratKontrol['jnsPelayanan']}}</td>
                                                        <td>
                                                            {{ $suratKontrol['terbitSEP']}}
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-print"></i></a>
                                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
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

    @endpush
    </x-main-layout>
