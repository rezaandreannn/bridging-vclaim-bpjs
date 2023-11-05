<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h4>Data Peserta Kronis</h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Peserta</a></div>
            </div>
        </div>

        <h2 class="section-title">Table</h2>
        <p class="section-lead">Data Peserta kronis <span class="text-success text-bold">Rumah Sakit</span> pada tanggal
            {{ date('d M, Y')}} </p>
        <a href="{{ route('rencana_kontrol.kronis.create')}}" class="btn btn-primary mb-1">Tambah Data</a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No SEP</th>
                                <th scope="col">Tgl Rencana Kontrol</th>
                                <th scope="col">Nama Peserta</th>
                                <th scope="col">Poli</th>
                                <th scope="col">Nama Dokter</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pasienKronis as $kronis)
                            <tr>
                                <td scope="row" width="2%">{{ $loop->iteration}}</td>
                                <td width="10%">{{ $kronis['no_sep']}}</td>
                                <td width="15%">{{ $kronis['tgl_rencana_kontrol']}}</td>
                                <td width="15%">{{ $kronis['nama_peserta'] }}
                                </td>
                                <td width="12%">{{ $kronis['nama_poli']}}</td>
                                <td width="20%">{{ $kronis['nama_dokter']}}</td>
                                <td>
                                    <a href="" class="btn btn-warning btn-action"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" class="btn btn-danger btn-action"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    <link rel="stylesheet"
        href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet"
        href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}" />
    @endpush

    @push('js-libraries')
    <script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('stisla/assets/js/page/modules-datatables.js')}}"></script>
    @include('sweetalert::alert')
    @endpush
    </x-main-layout>
