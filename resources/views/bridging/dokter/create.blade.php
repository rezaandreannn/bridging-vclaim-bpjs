<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h4>Tambah Data Peserta Kronis</h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Rencana Kontrol</a></div>
                <div class="breadcrumb-item active"><a href="#">Tambah</a></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Data</h4>
                    </div>
                    <form action="{{ route('bridging.dokter.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Dokter RS
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control" name="kode_dokter_rs">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Poli</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control select2" name="kode_poli" id="kode_poli">
                                        <option value="" selected disabled>-- Pilih Poli --</option>
                                        @foreach ($polis as $key => $poli)
                                        <option value="{{ $key }}">{{ $poli}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Dokter
                                    BPJS</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control select2" name="kode_dokter_bpjs" id="kode_dokter_bpjs">

                                    </select>
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
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}" />
    @endpush

    @push('js-libraries')
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#kode_poli').change(function () {
                var kodePoli = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('bridging.findDokter') }}",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'kode_poli': kodePoli
                    },
                    success: function (response) {
                        $('#kode_dokter_bpjs').empty();
                        $.each(response.data, function (i, item) {
                            $('#kode_dokter_bpjs').append($('<option>', {
                                value: item.kode,
                                text: item.nama
                            }));
                        });
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
