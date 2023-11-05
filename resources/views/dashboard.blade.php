<x-app-layout>
    <section class="section">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Status Klaim Rawat Jalan
                            <div class="dropdown d-inline">
                                <input type="date" class="form-control" name="tanggal_klaim" value="{{ date('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="countRajalProses">{{ $rajal['totalProses']}}
                                </div>
                                <div class="card-stats-item-label">Proses</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="countRajalPending">{{ $rajal['totalPending']}}
                                </div>
                                <div class="card-stats-item-label">Pending</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="countRajalKlaim">{{ $rajal['totalKlaim']}}</div>
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
                            {{ $rajal['total']}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Status Klaim Rawat Inap
                            <div class="dropdown d-inline">
                                <input type="date" class="form-control" name="tanggal_klaim_ranap"
                                    value="{{ date('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="countRanapProses">{{ $ranap['totalProses']}}
                                </div>
                                <div class="card-stats-item-label">Proses</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="countRanapPending">{{ $ranap['totalPending']}}
                                </div>
                                <div class="card-stats-item-label">Pending</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="countRanapKlaim">{{ $ranap['totalKlaim']}}</div>
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
                        <div class="card-body" id="countRanap">
                            {{ $ranap['total']}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Peserta Kronis</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="chart-container">
            <div class="pie-chart-container">
                <canvas id="pie-chart"></canvas>
            </div>
        </div> --}}
    </section>

    {{-- css library --}}
    @push('css-libraries')
    {{-- <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    --}}
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}" />
    @endpush

    @push('js-libraries')
    <script src="{{ asset('stisla/node_modules/chart.js/dist/Chart.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="{{ asset('stisla/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    {{-- <script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script> --}}
    <script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    {{-- <script src="{{ asset('stisla/assets/js/page/modules-chartjs.js') }}"></script> --}}
    {{-- <script src="{{ asset('stisla/assets/js/page/index.js')}}"></script> --}}

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
                        $('#countRajal').text(response.total);
                    },
                    error: function (error) {
                        alert('Gagal mengirim permintaan AJAX: ' + error);
                    }
                });
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            // Menangani peristiwa ketika input tanggal berubah
            $('input[name="tanggal_klaim_ranap"]').on('change', function () {
                // Mendapatkan nilai input tanggal
                var tanggalKlaim = $(this).val();


                // Melakukan permintaan AJAX ke controller
                $.ajax({
                    type: 'GET', // Atur metode HTTP sesuai dengan yang Anda perlukan
                    url: '/status-klaim-ranap',
                    data: {
                        tanggal_klaim: tanggalKlaim
                    },
                    success: function (response) {

                        // Memperbarui elemen count dengan hasil dari controller
                        $('#countRanapKlaim').text(response.totalKlaim);
                        $('#countRanapPending').text(response.totalPending);
                        $('#countRanapProses').text(response.totalProses);
                        $('#countRanap').text(response.total);
                    },
                    error: function (error) {
                        alert('Gagal mengirim permintaan AJAX: ' + error);
                    }
                });
            });
        });

    </script>

    <script>
        $(function () {
            var ctx = document.getElementById("myChart").getContext('2d');
            var cData = JSON.parse(`<?php echo $chart_data; ?>`);
            var labels = cData.label;
            var data = cData.data;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah',
                        data: data,
                        borderWidth: 2,
                        backgroundColor: '#6777ef',
                        borderColor: '#6777ef',
                        borderWidth: 2.5,
                        pointBackgroundColor: '#ffffff',
                        pointRadius: 4
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
                            ticks: {
                                beginAtZero: true,
                                stepSize: 150
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    },
                }
            });
        });

    </script>

    @endpush
</x-app-layout>
