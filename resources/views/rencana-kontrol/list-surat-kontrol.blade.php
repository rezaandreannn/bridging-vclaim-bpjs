<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h5>List Surat Kontrol</code></h5>
        </div>


        <div class="row" style="margin-top: -15px; margin-bottom: 15px">
            <div class="col-6">
                <form method="GET" action="" id="">
                    {{-- <label for="bulan">Silahkan Pilih Bulan<code>*</code></label> --}}
                    <div class="input-group">
                        <select class="custom-select" name="bulan" id="inputGroupSelect04">
                            <option selected disabled>-- Silahkan Pilih Bulan --</option>
                            <option value="01" {{ old('bulan', request('bulan')) == "01" ? 'selected' : '' }}>Januari</option>
                            <option value="02" {{ old('bulan', request('bulan')) == "02" ? 'selected' : '' }}>Februari</option>
                            <option value="03" {{ old('bulan', request('bulan')) == "03" ? 'selected' : '' }}>Maret</option>
                            <option value="04" {{ old('bulan', request('bulan')) == "04" ? 'selected' : '' }}>April</option>
                            <option value="05" {{ old('bulan', request('bulan')) == "05" ? 'selected' : '' }}>Mei</option>
                            <option value="06" {{ old('bulan', request('bulan')) == "06" ? 'selected' : '' }}>Juni</option>
                            <option value="07" {{ old('bulan', request('bulan')) == "07" ? 'selected' : '' }}>Juli</option>
                            <option value="08" {{ old('bulan', request('bulan')) == "08" ? 'selected' : '' }}>Agustus</option>
                            <option value="09" {{ old('bulan', request('bulan')) == "09" ? 'selected' : '' }}>September</option>
                            <option value="10" {{ old('bulan', request('bulan')) == 10 ? 'selected' : '' }}>Oktober</option>
                            <option value="11" {{ old('bulan', request('bulan')) == 11 ? 'selected' : '' }}>November</option>
                            <option value="12" {{ old('bulan', request('bulan')) == 12 ? 'selected' : '' }}>Desember</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Surat</th>
                                <th scope="col">Tgl Terbit </th>
                                <th scope="col">Tgl Rencana </th>
                                <th scope="col">SEP Asal</th>
                                <th scope="col">Jenis Pelayanan</th>
                                <th scope="col">Tgl SEP</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suratKontrols as $suratKontrol)
                            <tr>
                                <td scope="row" width="2%">{{ $loop->iteration }}</td>
                                <td>{{ $suratKontrol['noSuratKontrol']}}</td>
                                <td>{{ $suratKontrol['tglTerbitKontrol']}}</td>
                                <td>{{ $suratKontrol['tglRencanaKontrol']}}</td>
                                <td>{{ $suratKontrol['noSepAsalKontrol']}}</td>
                                <td>{{ $suratKontrol['jnsPelayanan'] }}</td>
                                <td>{{ $suratKontrol['tglSEP'] }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-info p-1"></i></a>
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
