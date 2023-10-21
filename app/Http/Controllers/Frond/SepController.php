<?php

namespace App\Http\Controllers\Frond;

use App\Http\Controllers\Controller;
use App\Repositories\RujukanRepository;
use Bpjs\Bridging\Vclaim\BridgeVclaim;
use Illuminate\Http\Request;

class SepController extends Controller
{
    protected $bridging;
    protected $rujukan;

    public function __construct(RujukanRepository $rujukan)
    {
        $this->bridging = new BridgeVclaim();
        $this->rujukan = $rujukan;
    }

    public function index($nomorKartu)
    {

        $rujukan = $this->rujukan->findByNomorKartu($nomorKartu);
        $dataRujukan = $rujukan['response']['rujukan'];

        // dd($dataRujukan);

        $requestData = [
            'request' => [
                't_sep' => [
                    "noKartu" => $dataRujukan['peserta']['noKartu'],
                    "tglSep" => "2021-07-30",
                    "ppkPelayanan" => $dataRujukan['provPerujuk']['kode'],
                    "jnsPelayanan" => "2", //rawat jalan
                    "klsRawat" => [
                        "klsRawatHak" => $dataRujukan['peserta']['hakKelas']['kode'],
                        "klsRawatNaik" => "1",
                        "pembiayaan" => "1",
                        "penanggungJawab" => "Pribadi"
                    ],
                    "noMR" => $dataRujukan['peserta']['mr']['noMR'],
                    "rujukan" => [
                        "asalRujukan" => "1", //faskes 1
                        "tglRujukan" => $dataRujukan['tglKunjungan'],
                        "noRujukan" => $dataRujukan['noKunjungan'],
                        "ppkRujukan" => $dataRujukan['provPerujuk']['kode']
                    ],
                    "catatan" => "testinsert RI",
                    "diagAwal" => $dataRujukan['diagnosa']['kode'],
                    "poli" => [
                        "tujuan" => $dataRujukan['poliRujukan']['kode'],
                        "eksekutif" => "0"
                    ],
                    "cob" => [
                        "cob" => "0"
                    ],
                    "katarak" => [
                        "katarak" => "0"
                    ],
                    "jaminan" => [
                        "lakaLantas" => "0",
                        "noLP" => "12345",
                        "penjamin" => [
                            "tglKejadian" => "",
                            "keterangan" => "",
                            "suplesi" => [
                                "suplesi" => "0",
                                "noSepSuplesi" => "",
                                "lokasiLaka" => [
                                    "kdPropinsi" => "",
                                    "kdKabupaten" => "",
                                    "kdKecamatan" => ""
                                ]
                            ]
                        ]
                    ],
                    "tujuanKunj" => "0",
                    "flagProcedure" => "",
                    "kdPenunjang" => "",
                    "assesmentPel" => "",
                    "skdp" => [
                        "noSurat" => "0301R0110721K000021",
                        "kodeDPJP" => "31574"
                    ],
                    "dpjpLayan" => "",
                    "noTelp" => "081111111101",
                    "user" => auth()->user()->name
                ]
            ]
        ];

        dd($requestData);
    }
}
