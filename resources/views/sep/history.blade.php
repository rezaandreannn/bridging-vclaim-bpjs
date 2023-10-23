<x-app-layout>
    <section class="section">
        <div class="section-header">
            <span>Histori SEP diambil dari mulai Tanggal : <code>{{$startDate}}</code> - <code>{{$endDate}}</code></span>
        </div>

        <div class="row">
            <div class="col-3">
                Nama Peserta
            </div>
            <div class="col-5">
                : {{ $histories[0]['namaPeserta']}}
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No SEP</th>
                                <th scope="col">Tgl SEP </th>
                                {{-- <th scope="col">Tgl Pulang SEP </th> --}}
                                <th scope="col">Poli</th>
                                {{-- <th scope="col">Jenis Pelayanan</th> --}}
                                <th scope="col">No Rujukan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($histories as $histori)
                            <tr>
                                <td scope="row" width="2%">{{ $loop->iteration}}</td>
                                <td>{{ $histori['noSep']}}</td>
                                <td width="15%">{{ $histori['tglSep']}}</td>
                                {{-- <td width="15%">{{ $histori['tglPlgSep']}}</td> --}}
                                <td>{{ $histori['poli']}}</td>
                                {{-- <td>{{ $histori['jnsPelayanan'] == '2' ? 'RAWAT JALAN' : 'RAWAT INAP' }}</td> --}}
                                <td>{{ $histori['noRujukan']}}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-info p-1"></i></a>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
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
