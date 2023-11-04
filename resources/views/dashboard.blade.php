<x-app-layout>
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Status Klaim Rawat Jalan
                            <div class="dropdown d-inline">
                                <input type="date" class="form-control" name="tanggal_klaim" value="{{ date('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="countRajalProses">{{ $result['totalProses']}}
                                </div>
                                <div class="card-stats-item-label">Proses</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="countRajalPending">{{ $result['totalPending']}}
                                </div>
                                <div class="card-stats-item-label">Pending</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="countRajalKlaim">{{ $result['totalKlaim']}}</div>
                                <div class="card-stats-item-label">Sukses</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total</h4>
                        </div>
                        <div class="card-body" id="countRajal">
                            {{ $result['totalRajal']}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- css library --}}
    @push('css-libraries')
    {{-- <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    --}}
    <link rel="stylesheet"
        href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}" />
    @endpush

    @push('js-libraries')
    {{-- <script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script> --}}
    <script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Menangani peristiwa ketika input tanggal berubah
            $('input[name="tanggal_klaim"]').on('change', function () {
                // Mendapatkan nilai input tanggal
                var tanggalKlaim = $(this).val();


                // Melakukan permintaan AJAX ke controller
                $.ajax({
                    type: 'GET', // Atur metode HTTP sesuai dengan yang Anda perlukan
                    url: '/status-klaim-rajal',
                    data: {
                        tanggal_klaim: tanggalKlaim
                    },
                    success: function (response) {

                        // Memperbarui elemen count dengan hasil dari controller
                        $('#countRajalKlaim').text(response.totalKlaim);
                        $('#countRajalPending').text(response.totalPending);
                        $('#countRajalProses').text(response.totalProses);
                        $('#countRajal').text(response.totalRajal);
                    },
                    error: function (error) {
                        console.log('Gagal mengirim permintaan AJAX: ' + error);
                    }
                });
            });
        });

    </script>

    @endpush
</x-app-layout>
