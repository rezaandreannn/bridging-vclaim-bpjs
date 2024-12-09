<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h4>Data Peserta</h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Peserta</a></div>
            </div>
        </div>

        <h2 class="section-title">Table</h2>
        <p class="section-lead">Data Peserta Cetak SEP Dari Anjungan pada tanggal
            {{ date('d M, Y')}} </p>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No SEP</th>
                                <th scope="col">No Kartu</th>
                                <th scope="col">No MR</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Poli</th>
                                <th scope="col">Dokter</th>
                                <th scope="col">Status</th>
                                {{-- <th scope="col">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $sep)
                            <tr>
                                <td scope="row" width="2%">{{ $loop->iteration}}</td>
                                <td width="15%">{{ $sep['no_sep']}}</td>
                                <td width="15%">{{ $sep['no_kartu']}}</td>
                                <td width="5%">{{ $sep['no_mr'] }}
                                <td width="10%">{{ $sep['nama'] }}
                                <td width="10%">{{ $sep['poli'] }}
                                <td width="10%">{{ $sep['nama_dokter'] }}
                                <td width="10%">{{ $sep['status'] == 1 ? 'Rujukan Baru' : 'Kontrol' }}
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
            font-size: 10px;
        }

        table.table th {
            font-size: 11px;
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
    @include('sweetalert::alert')
    @endpush
    </x-main-layout>