<x-main-layout>
    <section class="section">
        <div class="section-header" style="margin-top: -80px;">
            <form class="form-inline" action="" method="get">
                <label class="sr-only" for="inlineFormInputName2">Name</label>
                <input type="date" name="tanggal" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

                <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                <div class="input-group mb-2 mr-sm-2">
                    <select class="form-control form-select" name="jenis_pelayanan">
                        <option selected>Pilih Jenis Pelayanan</option>
                        <option value="1">Rawat Inap</option>
                        <option value="2">Rawat Jalan</option>
                    </select>

                </div>
                <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                <div class="input-group mb-2 mr-sm-2">
                    <select class="form-control form-select" name="status_klaim">
                        <option selected>Pilih Status Klaim</option>
                        <option value="1">Proses Verifikasi</option>
                        <option value="2">Proses Verifikasi</option>
                        <option value="3">Klaim</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-lg mb-2"><i class="fas fa-filter"></i> Filter</button>
            </form>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Data Klaim</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No MR</th>
                                <th scope="col">No Kartu</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Dokter</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($pasiens as $pasien)
                            <tr>
                                <td scope="row" width="2%">{{ $loop->iteration}}</td>
                            <td width="10%">{{ $pasien['No_MR']}}</td>
                            <td width="15%">{{ $pasien['No_Identitas']}}</td>
                            <td width="15%">{{ $pasien['Tanggal']}}</td>
                            <td width="12%">{{ $pasien['Nama_Pasien']}}</td>
                            <td width="20%">{{ $pasien['Nama_Dokter']}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-info p-1"></i></a>
                                <a href="" class="btn btn-primary btn-sm"><i class="far fa-copy"></i></a>
                            </td>
                            </tr>
                            @endforeach --}}
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
</x-main-layout>
