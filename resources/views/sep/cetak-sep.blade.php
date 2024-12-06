<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@100..900&display=swap" rel="stylesheet">


    <style>
        @media print {
            @page {
                size: 21cm 14cm;
                margin: 0;
            }

            .barcode {
                display: block !important;
            }

            body {
                margin: 0;
                margin-top: 20px;
                padding: 0;
                font-family: 'Roboto Flex', sans-serif;
                overflow: hidden;

            }

            .no-break {
                page-break-before: always;
                /* Memastikan elemen ini muncul di halaman baru */
            }

            .paragraf {
                font-weight: 200;
                /* Menambah ketebalan sedikit */
                font-variation-settings: 'wght'200 !important;
                /* Menggunakan weight 200 */
            }

            .custom-image {
                /*width: 100%;*/
                max-width: 200px;
                height: auto;

            }

            .logo_rs {
                max-width: 80px;
                height: auto;
            }

            .print-this {
                font-size: 12px;

            }

            .no-print {
                display: none;
            }

            .container {
                width: 100%;
                height: 100%;
                page-break-after: avoid;
                /* Mencegah pemutusan halaman */
            }
        }

    </style>
</head>

<body style="width: 21cm; height: 12cm;">
    <div class="justify-content-center">
        <div class="p-0 m-4" style="width: 100%; display: flex; justify-content: space-between; align-items: center; ">
            <!-- Gambar -->
            <div class="fw-bold border-0 p-0" style="width: 20%;">
                <div class="p-2">
                    <img src="{{ asset('img/bpjs-amiz.png')}}" class="img-thumbnail border-0 custom-image">
                </div>
            </div>

            <!-- Header -->
            <div class="border-0 mt-0" style="width: 60%; text-align: center;">
                <div class="h5 mt-0 fw-bold" style="margin-top: 0; margin-bottom: 0;">SURAT ELEGIBILITAS PESERTA</div>
                <div class="h6 mt-0 fw-bold" style="margin-top: 0; margin-bottom: 0;">RSU MUHAMMADIYAH METRO</div>
            </div>

            <!-- Kolom-kolom Kecil (5% masing-masing) -->
            <div class="border-0 p-0" style="width: 20%; text-align: center;">
                <div class="p-2">
                    <img src="{{ asset('img/logo_rsumm.png')}}" class="img-thumbnail border-0 logo_rs">
                </div>
            </div>
        </div>

        {{-- <hr style="border: 0; border-top: 1px dashed black; width: 90%; auto;"> --}}


        <!-- content -->

        <div style="width: 100%;" class="mt-0 m-4">
            <div class="text-sm-start fw-bold align-self-start d-flex justify-content-left" style="width: 100%;">

                <!-- kiri -->
                <div class="justify-content-center ms-2" style="width: 17.5%;">
                    <div>
                        <small class="paragraf">No. SEP</small>
                    </div>
                    <div>
                        <small class="paragraf">Tgl. SEP</small>
                    </div>
                    <div>
                        <small class="paragraf">No. Kartu</small>
                    </div>
                    <div>
                        <small class="paragraf">Nama Peserta</small>
                    </div>
                    <div>
                        <small class="paragraf">Tgl. Lahir</small>
                    </div>
                    <div>
                        <small class="paragraf">Jns. Kelamin</small>
                    </div>
                    <div>
                        <small class="paragraf">Poli Tujuan</small>
                    </div>

                    <div>
                        <small class="paragraf">Asal Faskes Tk.I</small>
                    </div>
                    <div>
                        <small class="paragraf">Diagnosa Awal</small>
                    </div>
                    <div>
                        <small class="paragraf">Catatan</small>
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
                        <small class="paragraf">{{ $sep['noSep']}}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{$sep['tglSep']}}</small>
                    </div>
                    <div>
                        <small id="noKartu" class="paragraf">{{$sep['peserta']['noKartu']}}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{$sep['peserta']['nama']}}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{$sep['peserta']['tglLahir']}}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{$sep['peserta']['kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'}}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{$sep['poli']}}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{$sepRen['provPerujuk']['nmProviderPerujuk']}}</small>
                    </div>
                    <div>
                        <small class="paragraf"> {{ $diagnosa }}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{ $sep['catatan']}}</small>
                    </div>
                </div>

                <!-- kanan -->
                <div class="justify-content-center ms-4 mt-5" style="width: 17.5%;">
                    <div>
                        <small class="paragraf">No MR</small>
                    </div>
                    <div>
                        <small class="paragraf">Peserta</small>
                    </div>
                    <div class="mt-4">
                        <small class="paragraf">COB</small>
                    </div>
                    <div>
                        <small class="paragraf">Jns. Rawat</small>
                    </div>
                    <div>
                        <small class="paragraf">Kelas Rawat</small>
                    </div>
                    <div>
                        <small class="paragraf">DPJP</small>
                    </div>

                    <!-- TTD -->
                    {{-- <div class="fw-bold mt-3" style="width: 100%;">
                        <div class="text-center">
                            <small> Pasien / </small>
                        </div>
                        <div class="text-center">
                            <small>Keluarga Pasien</small>
                        </div>
                        <div class="text-center mt-5 border-bottom border-dark">
                            <small></small>
                        </div>
                    </div> --}}
                </div>
                <div class="justify-content-center mt-5" style="width: 2.5%;">
                    <div>
                        <small>:</small>
                    </div>
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
                        <small class="paragraf">{{ $sep['peserta']['noMr']}}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{ $sep['peserta']['jnsPeserta']}}</small>
                    </div>
                    <div class="mt-4">
                        <small class="paragraf">{{$sep['cob'] == '0' ? '-' : $sep['con']}}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{ $sep['jnsPelayanan']}}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{ $sep['kelasRawat']}}</small>
                    </div>
                    <div>
                        <small class="paragraf">{{$sep['dpjp']['nmDPJP']}}</small>
                    </div>

                    <!-- TTD -->
                    {{-- <div class="fw-bold mt-4" style="width: 100%;">
                    <div class="text-center">
                        <small class="paragraf"> Pasien / Keluarga Pasien </small>
                    </div>
                    <div class="text-center barcode">
                        <img src="data:image/png;base64,{!! DNS2D::getBarcodePNG($sep['peserta']['noKartu'], 'QRCODE', 3, 3) !!}" alt="QR Code" />
                    </div>
                    <div class="text-center">
                        <p class="paragraf">{{$sep['peserta']['nama']}}</p>
                </div>
            </div> --}}
            {{-- <div class="fw-bold ms-3 mt-3" style="width: 70%;">
                        <div class="text-center">
                            <small> Petugas </small>
                        </div>
                        <div class="text-center">
                            <small>BPJS Kesehatan</small>
                        </div>
                        <div class="text-center mt-5 border-bottom border-dark">
                            <small></small>
                        </div>
                    </div> --}}
        </div>
    </div>

    <hr style="border: 0; border-top: 1px dashed black; width: 95%; auto;">

    <!-- Note -->
    <div class="p-0 mb-0" style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
        <!-- Bagian Kiri (Teks dan Tanggal) -->
        <div style="width: 70%; display: flex; flex-direction: column; justify-content: center;">
            <p><small class="paragraf"><em>*Saya menyetujui BPJS Kesehatan menggunakan informasi medis pasien jika diperlukan *SEP
                        bukan sebagai bukti perjanjian peserta </em>| <em>Dicetak pada :
                        {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('m/d/Y h:i A') }}</em></small>
            </p>
        </div>

        <!-- Bagian Kanan (Ttd Pasien dan QR Code) -->
        <div class="fw-bold" style="width: 30%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <!-- "Pasien / Keluarga Pasien" Teks Sejajar dengan Bagian Kiri -->
            <div class="text-center">
                <small class="paragraf">Pasien / Keluarga Pasien</small>
            </div>

            <!-- QR Code -->
            <div class="text-center barcode">
                <img src="data:image/png;base64,{!! DNS2D::getBarcodePNG($sep['peserta']['noKartu'], 'QRCODE', 3, 3) !!}" alt="QR Code" />
            </div>

            <!-- Nama Pasien -->
            <div class="text-center">
                <p class="paragraf">{{$sep['peserta']['nama']}}</p>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        window.onload = function() {
            document.body.style.maxWidth = "100%";
            window.print();
        }

        window.addEventListener('afterprint', function() {
            window.history.back();

        });

    </script>
</body>

</html>
