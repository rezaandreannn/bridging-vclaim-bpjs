<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h4>Data Kunjungan</h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Kunjungan</a></div>
            </div>
        </div>
        <form class="form-inline" action="" method="get">
            <label class="sr-only" for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" value="{{ request()->input('tanggal')}}" class="form-control mb-2 mr-sm-2" id="tanggal">

            <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
            <div class="input-group mb-2 mr-sm-2">
                <select class="form-control form-select" name="jenis_pelayanan">
                    <option selected>Pilih Jenis Pelayanan</option>
                    <option value="1" {{ request()->input('jenis_pelayanan') == 1 ? 'selected' : ''}}>Rawat Inap</option>
                    <option value="2" {{ request()->input('jenis_pelayanan') == 2 ? 'selected' : ''}}>Rawat Jalan</option>
                </select>

            </div>
            <button class="btn btn-primary mb-2"><i class="fas fa-filter"></i> Filter</button>
        </form>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No SEP</th>
                                <th scope="col">No Kartu</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Poli</th>
                                <th scope="col">No Rujukan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kunjungans as $kunjungan)
                            <tr>
                                <td scope="row" width="2%">{{ $loop->iteration}}</td>
                                <td width="20%">
                                    <a href="">{{ $kunjungan['noSep'] }}</a>
                                </td>
                                <td width="15%">{{ $kunjungan['noKartu']}}</td>
                                <td width="15%">{{ $kunjungan['tglSep']}}</td>
                                <td width="12%">{{ $kunjungan['nama']}}</td>
                                <td>{{ $kunjungan['poli']}}</td>
                                <td width="15%">
                                    <a href="">{{ $kunjungan['noRujukan']}}</a>
                                </td>
                                <td width="25%">
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
            font-size: 11px;
        }

        table.table th {
            font-size: 12px;
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

    @endpush
    </x-main-layout>
