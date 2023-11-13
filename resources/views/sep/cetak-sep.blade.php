<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        @media print {
            @page {
                size: 21cm 14cm;
                margin: 0;

            }

            body {

                margin: 0;
                margin-top: 50px;
                padding: 0;
            }

            /* Tambahkan gaya khusus untuk elemen yang ingin Anda cetak */
            .print-this {
                font-size: 12px;
                /* Atur ukuran font sesuai kebutuhan */
            }
        }

    </style>
</head>

<body style="width: 21cm; height: 12cm;">
    <div class="justify-content-center">
        <div class="p-0 m-4 width: 12cm; height: 9cm; border-1 align-self-start d-flex justify-content-center mb-3"
            style="width: 100%;">
            <div class="fw-bold border-0 p-0" style="width:20%;">
                <div class="p-2">
                </div>
                <div>
                    <img src="{{ asset('img/bpjs-amiz.png')}}" class="img-thumbnail border-0" style="width:100%;">
                </div>
                <div>
                </div>
            </div>

            <!-- Header -->
            <div class="border-0 mt-0 justify-left" style="width:65%;">
                <div class="h5 mt-0 fw-bold text-center">SURAT ELEGIBILITAS PESERTA</div>
                <div class="h6 mt-0 fw-bold text-center">RSU MUHAMMADIYAH METRO</div>
            </div>
            <div class="border-0 mt-0" style="width:5%;">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width:5%;">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width:5%;">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width:5%;">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width:5%;">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
        </div>

        <!-- content -->

        <div style="width: 100%;" class="mt-0 m-4">
            <div class="text-sm-start fw-bold align-self-start d-flex justify-content-left" style="width: 100%;">

                <!-- kiri -->
                <div class="justify-content-center ms-2" style="width: 17.5%;">
                    <div>
                        <small>No. SEP</small>
                    </div>
                    <div>
                        <small>Tgl. SEP</small>
                    </div>
                    <div>
                        <small>No. Kartu</small>
                    </div>
                    <div>
                        <small>Nama Peserta</small>
                    </div>
                    <div>
                        <small>Tgl. Lahir</small>
                    </div>
                    <div>
                        <small>Jns. Kelamin</small>
                    </div>
                    <div>
                        <small>Poli Tujuan</small>
                    </div>
 
                    <div>
                        <small>Asal Faskes Tk.I</small>
                    </div>
                    <div>
                        <small>Diagnosa Awal</small>
                    </div>
                    <div>
                        <small>Catatan</small>
                    </div>
                </div>
                <div class="justify-content-center" style="width: 2.5%;">
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
   
                </div>
                <div class="justify-content-center" style="width: 30%;">
                    <div>
                        <small>{{ $sep['noSep']}}</small>
                    </div>
                    <div>
                        <small>{{$sep['tglSep']}}</small>
                    </div>
                    <div>
                        <small id="noKartu">{{$sep['peserta']['noKartu']}}</small>
                    </div>
                    <div>
                        <small>{{$sep['peserta']['nama']}}</small>
                    </div>
                    <div>
                        <small>{{$sep['peserta']['tglLahir']}}</small>
                    </div>
                    <div>
                        <small>{{$sep['peserta']['kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'}}</small>
                    </div>
                    <div>
                        <small>{{$sep['poli']}}</small>
                    </div>
                    <div>
                        <small>{{$sepRen['provPerujuk']['nmProviderPerujuk']}}</small>
                    </div>
                    <div>
                        <small> {{ $diagnosa }}</small>
                    </div>
                    <div>
                        <small>{{ $sep['catatan']}}</small>
                    </div>
                </div>

                <!-- kanan -->
                <div class="justify-content-center ms-4 mt-5" style="width: 17.5%;">
                    <div>
                        <small>Peserta</small>
                    </div>
                    <div class="mt-4">
                        <small>COB</small>
                    </div>
                    <div>
                        <small>Jns. Rawat</small>
                    </div>
                    <div>
                        <small>Kelas Rawat</small>
                    </div>
                    <div>
                        <small>DPJP</small>
                    </div>

                    <!-- TTD -->
                    <div class="fw-bold mt-3" style="width: 100%;">
                        <div class="text-center">
                            <small> Pasien / </small>
                        </div>
                        <div class="text-center">
                            <small>Keluarga Pasien</small>
                        </div>
                        <div class="text-center mt-5 border-bottom border-dark">
                            <small></small>
                        </div>
                    </div>
                </div>
                <div class="justify-content-center mt-5" style="width: 2.5%;">
                    <div>
                        <small>:</small>
                    </div>
                    <div class="mt-4">
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                    <div>
                        <small>:</small>
                    </div>
                </div>
                <div class="justify-content-center mt-5" style="width: 30%;">
                    <div>
                        <small>{{ $sep['peserta']['jnsPeserta']}}</small>
                    </div>
                    <div class="mt-4">
                        <small>{{$sep['cob'] == '0' ? '-' : $sep['con']}}</small>
                    </div>
                    <div>
                        <small>{{ $sep['jnsPelayanan']}}</small>
                    </div>
                    <div>
                        <small>{{ $sep['kelasRawat']}}</small>
                    </div>
                    <div>
                        <small>{{$sep['dpjp']['nmDPJP']}}</small>
                    </div>

                    <!-- TTD -->
                    <div class="fw-bold ms-3 mt-3" style="width: 70%;">
                        <div class="text-center">
                            <small> Petugas </small>
                        </div>
                        <div class="text-center">
                            <small>BPJS Kesehatan</small>
                        </div>
                        <div class="text-center mt-5 border-bottom border-dark">
                            <small></small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Note -->
            <div style="width: 70%;">
                <p><small><em>*Saya menyetujui BPJS Kesehatan menggunakan informasi medis pasien jika diperlukan *SEP
                            bukan sebagai bukti perjanjian peserta </em>| <em>Dicetak pada :
                            {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('m/d/Y h:i A') }}</em></small>
                </p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        window.onload = function () {
            window.print();
        }

        window.addEventListener('afterprint', function () {
            window.history.back();

        });

    </script>
</body>

</html>
