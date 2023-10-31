<?php

namespace App\Http\Controllers\Pasien\Frond;

use Carbon\Carbon;
use App\Models\BridgePoli;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Repositories\RujukanRepository;
use App\Repositories\FingerPrintRepository;

class RujukanNewController extends Controller
{
    protected $rujukanRepository;
    protected $sepRepository;
    protected $fingerPrintRepository;

    public function __construct(RujukanRepository $rujukanRepository, SepRepository $sepRepository, FingerPrintRepository $fingerPrintRepository)
    {
        $this->rujukanRepository = $rujukanRepository;
        $this->sepRepository = $sepRepository;
        $this->fingerPrintRepository = $fingerPrintRepository;
    }

    public function insertSep()
    {
        // ambil session pasien
        $nomorKartu = session()->get('pasien')['no_identitas'];
        $kodeDokterRs = session()->get('pasien')['kode_dokter_rs'];

        // cek session apakah masih aktif
        if (!session()->has('pasien')) {
            return redirect()->back()->with('error', 'Sesi telah habis');
        }

        // get rujukan by nomor kartu
        $response = $this->rujukanRepository->getByNomorKartu($nomorKartu);
        if ($response['metaData']['code'] == 200) {
            // ambil data rujukan yang sesuai dengan pendaftaran online
            $rujukans = [];
            $dataRujukan = $response['response']['rujukan'];

            // get row kode dokter dari pendaftaran online
            $bridge = $this->findPoli($kodeDokterRs);
            $poliRs = $bridge['kode_poli'];

            foreach ($dataRujukan as $rujukan) {
                $poliRujukan = $rujukan['poliRujukan'];
                $poliKode = $poliRujukan['kode'];

                // Bandingkan kode poli dengan kode yang ada di database
                if ($poliKode == $poliRs) {
                    $rujukans[] = $rujukan;
                }
            }

            // cek apakah pasien sudah finger 
            $findFinger = $this->cekFinger($nomorKartu);

            // if ($poliRs != 'ANA' && $findFinger['kode'] != 1) {
            //     return redirect()->back()->with('error', $findFinger['status']);
            // }

            // cek rujukan sudah terbit SEP atau belum
            if ($rujukans != null) {
                // ambil histori SEP
                $sepHistories = $this->getHistoriSep($nomorKartu);
                // cek apakah SEP ada
                if ($sepHistories != null) {
                    foreach ($sepHistories as $sepHistory) {
                        $noRujukan = $sepHistory['noRujukan'];
                        if ($noRujukan == $rujukans[0]['noKunjungan']) {
                            $message = 'data rujukan sudah terbit SEP, Silahkan pilih kontrol untuk cetak sep';
                            return redirect()->back()->with('error', $message);
                        }
                    }
                }
                // jika SEP belum ada makan insert SEP
                $dataRujukan = $rujukans[0];
                $requestData = [
                    'request' => [
                        't_sep' => [
                            "noKartu" => $dataRujukan['peserta']['noKartu'],
                            "tglSep" => date('Y-m-d'),
                            "ppkPelayanan" => "0107R006",
                            "jnsPelayanan" => "2", //rawat jalan
                            "klsRawat" => [
                                "klsRawatHak" => $dataRujukan['peserta']['hakKelas']['kode'],
                                "klsRawatNaik" => "",
                                "pembiayaan" => "",
                                "penanggungJawab" => ""
                            ],
                            "noMR" => $dataRujukan['peserta']['mr']['noMR'] ?? '214942',
                            "rujukan" => [
                                "asalRujukan" => "1", //faskes 1
                                "tglRujukan" => $dataRujukan['tglKunjungan'],
                                "noRujukan" => $dataRujukan['noKunjungan'],
                                "ppkRujukan" => $dataRujukan['provPerujuk']['kode']
                            ],
                            "catatan" => "",
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
                                "noLP" => "",
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
                                "noSurat" => "",
                                "kodeDPJP" => ""
                            ],
                            "dpjpLayan" => $bridge['kode_dokter_bpjs'], //diambil dari relasi table dokter bridge
                            "noTelp" => '082374958627',
                            "user" => auth()->user()->name ?? ''
                        ]
                    ]
                ];

                // dd($requestData);

                $insert = json_encode($requestData, true);
                $response = $this->sepRepository->insert($insert);
                if ($response['metaData']['code'] == 200) {
                    dd($response);
                } else {
                    $message = $response['metaData']['message'];
                    return redirect()->back()->with('error', $message);
                }
                return view('pasien.cetak-sep', compact('rujukans'));
            } else {
                $message = 'Rujukan tidak ditemukan';
                return redirect()->back()->with('error', $message);
            }
        } else {
            $message = 'Rujukan tidak ditemukan';
            return redirect()->back()->with('error', $message);
        }
    }

    private function findPoli($kodeDokterRs)
    {
        return BridgePoli::where('kode_dokter_rs', $kodeDokterRs)->first();
    }

    public function getHistoriSep($noKartu)
    {
        // ambil data history SEP 
        $currentDate = Carbon::now();
        // ubah menjadi tanggal format (YYYY-mm-dd)
        $endDate = $currentDate->toDateString();
        // ambil tanggal 90 hari dari tanggal sekarang
        $startDate = $currentDate->copy()->subDays(90)->toDateString();

        $result =  $this->sepRepository->history($noKartu,  $startDate, $endDate);
        // dd($result['metaData']['code'] == 200);
        if ($result['metaData']['code'] == 200) {
            return $result['response']['histori'];
        } else {
            return $result['response'];
        }
    }

    private function cekFinger($nomorKartu)
    {
        $dateNow = date('Y-m-d');

        $dataEncode =  $this->fingerPrintRepository->byNoKartuAndTanggal($nomorKartu, $dateNow);
        $data = json_decode($dataEncode, true);
        $result = $data['response'];
        return $result;
    }
}
