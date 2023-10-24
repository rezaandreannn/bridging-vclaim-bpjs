<x-app-layout>
    <section class="section">
        <div class="section-header">
            <span>Menampilkan Data Rujukan Dari <span class="text-danger">Faskes 1(Pcare)</span> Yang Masih Aktif</span>
        </div>

        @if(!empty($rujukans))
        <div class="row" style="margin-top: -22px;">
            <div class="col-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Identitas Peserta. </h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="collapse hide" id="mycard-collapse">
                        <div class="card-body">
                            <x-rujukan-biodata-content key="Nama" :value="$rujukans[0]['peserta']['nama']" />
                            <x-rujukan-biodata-content key="No. Kartu" :value="$rujukans[0]['peserta']['noKartu']" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Fungsi Button Pada Tab Aksi. </h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse-aksi" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="collapse hide" id="mycard-collapse-aksi">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-info p-1"></i></a>
                                </div>
                                <div class="col-md-11">
                                    <p> Untuk Melihat Detail Rujukan </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <a href="" class="btn btn-primary btn-sm"><i class="far fa-copy"></i></a>
                                </div>
                                <div class="col-md-11">
                                    <p> Untuk Membuat SEP Berdasakran Rujukan </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Rujukan</th>
                                <th scope="col">Tgl Kunjungan </th>
                                <th scope="col">Prov Perujuk </th>
                                <th scope="col">Pelayanan</th>
                                <th scope="col">Poli</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rujukans as $rujukan)
                            <tr>
                                <td scope="row" width="2%">{{ $loop->iteration}}</td>
                                <td>{{ $rujukan['noKunjungan']}}</td>
                                <td width="15%">{{ $rujukan['tglKunjungan']}}</td>
                                <td width="15%">{{ $rujukan['provPerujuk']['nama']}}</td>
                                <td>{{ $rujukan['pelayanan']['kode'] == '2' ? 'RAWAT JALAN' : 'RAWAT INAP' }}</td>
                                <td>{{ $rujukan['poliRujukan']['nama']}}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-info p-1"></i></a>

                                    <a href="" class="btn btn-primary btn-sm"><i class="far fa-copy"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
</x-app-layout>
