<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h4>Detail SEP</h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Detail SEP</a></div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h4>No SEP. {{ $sep['noSep'] }} </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-4">
                                <span>Nama Peserta.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['peserta']['nama']}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <span>Tanggal SEP</span>
                            </div>
                            <div class="col-8">
                                <span>: {{ $sep['tglSep'] }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <span>No Kartu.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['peserta']['noKartu']}}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <span>No MR.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['peserta']['noMr'] ?? ''}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <span>Jenis Kelamin.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['peserta']['kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <span>Jenis Peserta.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['peserta']['jnsPeserta']}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <span>Hak Kelas.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['peserta']['hakKelas']}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">

                        <div class="row">
                            <div class="col-4">
                                <span>Kode DPJP.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['dpjp']['kdDPJP']}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <span>Nama DPJP.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['dpjp']['nmDPJP']}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <span>Tujuan Kunjungan.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['tujuanKunj']['nama']}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <span>Flag Prosedure.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['flagProcedure']['nama']}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <span>Penunjang.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['kdPenunjang']['nama']}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <span>Assesmen Pelayanan.</span>
                            </div>
                            <div class="col-8">
                                <span>: {{$sep['assestmenPel']['nama']}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3">
                        <a href="{{ route('sep.delete', $sep['noSep'])}}" class="btn btn-danger btn-icon icon-left"><i
                                class="fas fa-trash-alt"></i> Hapus SEP</a>
                        {{-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-edit"></i> Edit SEP</button> --}}
                        <a href="" class="btn btn-info btn-icon icon-left"><i class="fas fa-download"></i>
                            Unduh</a>
                    </div>
                    <a href="{{ route('sep.print', $sep['noSep'] )}}" class="btn btn-primary btn-icon icon-left"
                        data-toggle="tooltip" title="Print" id="printButton"><i class="fas fa-print"></i> Print</a>
                    {{-- <a href="" class="btn btn-primary btn-icon icon-left"><i class="fas fa-print"></i> Print</button> --}}
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

    <link rel="stylesheet" href="{{ asset('stisla/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}">
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
    <script src="{{ asset('stisla/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('stisla/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js' )}}"></script>
    <script src="{{ asset('stisla/assets/js/page/forms-advanced-forms.js')}}"></script>
    @include('sweetalert::alert')
    @endpush
</x-app-layout>
