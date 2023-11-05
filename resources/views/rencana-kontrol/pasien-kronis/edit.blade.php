<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h4>Edit Data Peserta Kronis</h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Rencana Kontrol</a></div>
                <div class="breadcrumb-item active"><a href="#">Edit</a></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit Data</h4>
                    </div>
                    <form action="{{ route('rencana_kontrol.kronis.update', $pasienKronis->id)}}" method="post">
                    @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No SEP/Nama</label>
                                <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="no_sep" value="{{ $pasienKronis->no_sep }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tgl Rencana
                                    Kontrol</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="date" class="form-control" name="tgl_rencana_kontrol" value="{{ $pasienKronis->tgl_rencana_kontrol }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Poli</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_poli" value="{{ $pasienKronis->nama_poli }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama dokter</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_dokter" value="{{ $pasienKronis->nama_dokter }}" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </section>

    {{-- css library --}}
    @push('css-libraries')

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
    <script>
        $(document).ready(function () {
            $('#noSepSelect').change(function () {
                var selectedNoSep = $(this).val();


                $.ajax({
                    type: 'POST',
                    url: "{{ route('rencana_kontrol.fetchSep') }}",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'no_sep': selectedNoSep
                    },
                    success: function (response) {
                        console.log(response)
                        // Update the readonly fields with the data from the response
                        $('[name="nama_poli"]').val(response.nama_poli);
                        $('[name="nama_dokter"]').val(response.nama_dokter);
                        $('[name="kode_dokter"]').val(response.kode_dokter);
                        $('[name="nama_peserta"]').val(response.nama_peserta);

                        var currentDate = new Date();
                        currentDate.setDate(currentDate.getDate() + 31);

                        // Format the date as YYYY-MM-DD (assuming you want that format)
                        var formattedDate = currentDate.toISOString().split('T')[0];

                        // Update the "Tgl Rencana Kontrol" input field
                        $('[name="tgl_rencana_kontrol"]').val(formattedDate);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });

    </script>

    @endpush
    </x-main-layout>
