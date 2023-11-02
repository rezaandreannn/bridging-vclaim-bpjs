<x-main-layout>
    <section class="section">

        <div class="col-12 col-md-10 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline" action="" method="get">
                        {{-- input --}}
                        <div class="form-group">
                            {{-- <label>Date</label> --}}
                            <input type="text" class="form-control datemask" placeholder="YYYY/MM/DD">
                        </div>
                        <div class="form-group ml-2" style="width: 300px;">
                            {{-- <label>Nama Peserta</label> --}}
                            <select class="form-control select2">
                                <option>Option 1</option>
                            </select>
                        </div>
                        <button class="btn btn-primary btn-lg ml-2"><i class="fas fa-search"></i> Cari</button>
                    </form>
                </div>
            </div>
        </div>




        {{-- <div class="section-header" style="margin-top: -80px;">
            <form class="form-inline" action="" method="get">
                <input type="date" name="tanggal" value="{{ request()->input('tanggal')}}" class="form-control mb-2 mr-sm-2" id="tanggal">
        <label class="sr-only" for="no_sep">No SEP</label>
        <input type="text" name="no_sep" value="{{ request()->input('no_sep')}}" class="form-control mb-2 mr-sm-2" id="no_sep" required>
        <button class="btn btn-primary btn-lg mb-2"><i class="fas fa-search"></i> Cari</button>
        </form>
        </div> --}}

        @if($sep != null)
        <div class="card">
            <div class="card-header">
                <h4>Detail SEP </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <span>No SEP</span>
                    </div>
                    <div class="col-9">
                        <span>: {{ $sep['noSep'] }}</span>
                    </div>
                    <div class="col-3">
                        <span>Tanggal SEP</span>
                    </div>
                    <div class="col-9">
                        <span>: {{ $sep['tglSep'] }}</span>
                    </div>
                    <div class="col-3">
                        <span>No Kartu.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['peserta']['noKartu']}}</span>
                    </div>
                    <div class="col-3">
                        <span>Nama Peserta.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['peserta']['nama']}}</span>
                    </div>
                    <div class="col-3">
                        <span>No MR.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['peserta']['noMr'] ?? ''}}</span>
                    </div>
                    <div class="col-3">
                        <span>Jenis Kelamin.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['peserta']['kelamin']}}</span>
                    </div>
                    <div class="col-3">
                        <span>Jenis Peserta.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['peserta']['jnsPeserta']}}</span>
                    </div>
                    <div class="col-3">
                        <span>Hak Kelas.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['peserta']['hakKelas']}}</span>
                    </div>
                    <div class="col-3">
                        <span>Kode DPJP.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['dpjp']['kdDPJP']}}</span>
                    </div>
                    <div class="col-3">
                        <span>Nama DPJP.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['dpjp']['nmDPJP']}}</span>
                    </div>
                    <div class="col-3">
                        <span>Tujuan Kunjungan.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['tujuanKunj']['nama']}}</span>
                    </div>
                    <div class="col-3">
                        <span>Flag Prosedure.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['flagProcedure']['nama']}}</span>
                    </div>
                    <div class="col-3">
                        <span>Penunjang.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['kdPenunjang']['nama']}}</span>
                    </div>
                    <div class="col-3">
                        <span>Assesmen Pelayanan.</span>
                    </div>
                    <div class="col-9">
                        <span>: {{$sep['assestmenPel']['nama']}}</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3">
                        <a href="{{ route('sep.delete', $sep['noSep'])}}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-trash-alt"></i> Hapus SEP</a>
                        <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-edit"></i> Edit SEP</button>
                    </div>
                    <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
            @else
            @if(request()->input('no_sep'))
            <div class="alert alert-danger" role="alert">
                <span>Data Tidak ditemukan</span>
            </div>
            @endif
            @endif
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

    <link rel="stylesheet" href="{{ asset('stisla/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}">
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
    <script src="{{ asset('stisla/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('stisla/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js' )}}"></script>
    <script src="{{ asset('stisla/assets/js/page/forms-advanced-forms.js')}}"></script>
    @include('sweetalert::alert')
    @endpush
</x-main-layout>
