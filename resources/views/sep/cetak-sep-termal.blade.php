<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <style>
        @media print {
            @page {
                margin: 0;
            }

            body {
                margin: 0;

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

<body style="width: 80mm">
    <div class="justify-content-center">
        <div class="p-0 m-2 border-1 align-self-start d-flex justify-content-center mb-3" style="width: 100%">
            <div class="fw-bold border-0 p-0" style="width: 20%">
                <div class="p-2"></div>
                <div></div>
            </div>

            <!-- Header -->
            <div class="border-0 mt-0 justify-left" style="width: 120%">
                <div class="mt-0 text-center">
                    <p style="font-size: 12px">
                        <b>RSU MUHAMMADIYAH METRO</b> <br />
                        Jl. Soekarno Hatta No. 42 Mulyojati 16B <br />
                        Metro Barat Kota Metro
                    </p>
                </div>
                <div class="h6 mt-0 fw-bold text-center"></div>
            </div>
            <div class="border-0 mt-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
        </div>

        <!-- content -->

        <div style="width: 100%" class="mt-0 m-2">
            <div class="text-sm-start align-self-start d-flex justify-content-left" style="width: 100%">
                <!-- kiri -->
                <div class="justify-content-center ms-2">
                    <div>
                        <p style="font-size: 12px">
                            No. SEP : {{$sep['noSep']}}<br />No MR : {{$sep['peserta']['noMr']}}<br />
                            Nama : {{ $sep['peserta']['nama']}} <br />
                            Poli Tujuan : {{ $sep['poli']}} <br />Jenis Pelayanan : {{ $sep['jnsPelayanan']}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-0 m-2 border-1 align-self-start d-flex justify-content-center mb-2" style="width: 100%">
            <div class="fw-bold border-0 p-0" style="width: 20%">
                <div class="p-2"></div>
                <div></div>
            </div>

            <!-- Header -->
            <div class="border-0 mt-0 justify-left" style="width: 120%">
                <div class="mt-0 text-center">
                    <p style="font-size: 12px">
                        <b>Telah Melakukan Finger dan Cetak SEP</b> <br />
                        Pada 07/11/2023 08:59AM <br />
                        ------------------------------------------
                    </p>
                </div>
                <div class="h6 mt-0 fw-bold text-center"></div>
            </div>
            <div class="border-0 mt-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
        </div>

        <div style="width: 100%" class="mt-0 m-2">
            <div class="text-sm-start align-self-start d-flex justify-content-left" style="width: 100%">
                <!-- kiri -->
                <div class="justify-content-center ms-2">
                    <div class="mb-4">
                        <p style="font-size: 12px">Pelayanan Penunjang :</p>
                    </div>
                    <div class="mb-4">
                        <p style="font-size: 12px">Pelayanan Poli :</p>
                    </div>
                    <div class="mb-4">
                        <p style="font-size: 12px">Pelayanan Farmasi :</p>
                    </div>
                    <div class="mb-4">
                        <p style="font-size: 12px">Pelayanan Kasir :</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-0 m-2 border-1 align-self-start d-flex justify-content-center mb-1" style="width: 100%">
            <div class="fw-bold border-0 p-0" style="width: 20%">
                <div class="p-2"></div>
                <div></div>
            </div>

            <!-- Header -->
            <div class="border-0 mt-0 justify-left" style="width: 90%">
                <div class="mt-0 text-center">
                    <p style="font-size: 12px">
                        <b>Kertas ini jangan sampai hilang</b> <br />
                        sebagai bukti pelayanan <br />
                        ------------------------------------------
                    </p>
                </div>
                <div class="h6 mt-0 fw-bold text-center"></div>
            </div>
            <div class="border-0 mt-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
        </div>

        <div class="p-0 m-2 border-1 align-self-start d-flex justify-content-center mb-3" style="width: 100%">
            <div class="fw-bold border-0 p-0" style="width: 20%">
                <div class="p-2"></div>
                <div></div>
            </div>

            <!-- Header -->
            <div class="border-0 mt-0 justify-left" style="width: 120%">
                <div class="mt-0 text-center">
                    <p style="font-size: 12px">
                        <b>RSU MUHAMMADIYAH METRO</b> <br />
                        Jl. Soekarno Hatta No. 42 Mulyojati 16B <br />
                        Metro Barat Kota Metro <br />
                    </p>
                </div>
                <div class="h6 mt-0 fw-bold text-center"></div>
            </div>
            <div class="border-0 mt-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
        </div>

        <!-- content -->

        <div style="width: 100%" class="mt-0 m-2">
            <div class="text-sm-start align-self-start d-flex justify-content-left" style="width: 100%">
                <!-- kiri -->
                <div class="justify-content-center ms-2">
                    <div>
                        <p style="font-size: 12px">
                            No. SEP : 0107R0061123V002989<br />No MR : 205967<br />
                            Nama : MUHAMMAD YUSUF <br />
                            Poli Tujuan : MATA <br />Jenis Pelayanan : R. Jalan
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-0 m-2 border-1 align-self-start d-flex justify-content-center mb-2" style="width: 100%">
            <div class="fw-bold border-0 p-0" style="width: 20%">
                <div class="p-2"></div>
                <div></div>
            </div>

            <!-- Header -->
            <div class="border-0 mt-0 justify-left" style="width: 120%">
                <div class="mt-0 text-center">
                    <p style="font-size: 12px">
                        <b>Telah Melakukan Finger dan Cetak SEP</b> <br />
                        Pada 07/11/2023 08:59AM <br />
                        ------------------------------------------
                    </p>
                </div>
                <div class="h6 mt-0 fw-bold text-center"></div>
            </div>
            <div class="border-0 mt-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
            <div class="border-0 p-0" style="width: 5%">
                <div class="h3 fw-bold text-center"></div>
                <div class="h3 fw-bold text-center"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        window.onload = function() {
            window.print();
        };

        window.addEventListener("afterprint", function() {
            window.history.back();
        });

    </script>
</body>
</html>
