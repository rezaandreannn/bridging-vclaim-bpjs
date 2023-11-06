<?php

namespace App\Http\Controllers\Pasien\Frond;

use Carbon\Carbon;
use App\Models\BridgePoli;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Models\RencanaKontrolKronis;
use App\Repositories\RujukanRepository;
use App\Repositories\FingerPrintRepository;
use App\Repositories\RencanaKontrolRepository;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class InsertSepController extends Controller
{
    protected $rujukanRepository;
    protected $sepRepository;
    protected $fingerPrintRepository;
    protected $rencanaKontrolRepository;

    public function __construct(RujukanRepository $rujukanRepository, SepRepository $sepRepository, FingerPrintRepository $fingerPrintRepository, RencanaKontrolRepository $rencanaKontrolRepository)
    {
        $this->rujukanRepository = $rujukanRepository;
        $this->sepRepository = $sepRepository;
        $this->fingerPrintRepository = $fingerPrintRepository;
        $this->rencanaKontrolRepository = $rencanaKontrolRepository;
    }

    public function byNewRujukan(Request $request)
    {
        // CEK APAKAH SESSION MASIH AKTIF
        if ($request->session()->has('pasien')) {
            $nomorKartu = $request->session()->get('pasien')['no_identitas'];
            $kodeDokterRs = $request->session()->get('pasien')['kode_dokter_rs'];
            $noMr = $request->session()->get('pasien')['no_mr'];
            $noHp = $request->session()->get('pasien')['no_telepon'];
        } else {
            return redirect()->back()->with('error', 'Sesi telah habis');
        }

        try {
            $response = $this->rujukanRepository->getByNomorKartu($nomorKartu);
            if ($response['metaData']['code'] == 200) {
                $rujukans = [];

                $dataRujukan = $response['response']['rujukan'];

                // GET 1 BARIS DARI BERDASARKAN KODE DOKTER YANG ADA DI RS
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

                // AMBIL DATA FINGER HARI DAN CEK APAKAH PESERTA SUDAH MELAKUKAN FINGER 
                $findFinger = $this->cekFinger($nomorKartu);

                if ($poliRs != 'ANA' && $findFinger['kode'] != 1) {
                    return redirect()->back()->with('error', $findFinger['status']);
                }

                // CEK RUJUKAN APAKAH SUDAH TERBIT SEP ATAU BELUM
                if ($rujukans != null) {
                    // AMBIL HISTORY SEP
                    $sepHistories = $this->getHistoriSep($nomorKartu);
                    // CEK APAKAH SEP ADA
                    if ($sepHistories != null) {
                        foreach ($sepHistories as $sepHistory) {
                            $noRujukan = $sepHistory['noRujukan'];
                            if ($noRujukan == $rujukans[0]['noKunjungan']) {
                                $message = 'data rujukan sudah terbit SEP, Silahkan pilih kontrol untuk cetak sep';
                                return redirect()->back()->with('error', $message);
                            }
                        }
                    }
                    // JIKA SEP BELUM ADA MAKA INSERT DATA SEP
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
                                "noMR" => $dataRujukan['peserta']['mr']['noMR'] ?? $noMr,
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
                                "noTelp" => $dataRujukan['peserta']['mr']['noTelepon'] ?? $noHp,
                                "user" => auth()->user()->name ?? 'admin'
                            ]
                        ]
                    ];

                    $insert = json_encode($requestData, true);
                    $response = $this->sepRepository->insert($insert);
                    if ($response['metaData']['code'] == 200) {
                        $data = $response['response']['sep'];
                        $printData = [
                            'noSep' => $data['noSep'],
                            'tglSep' => $data['tglSep'],
                            'noKartu' => $data['peserta']['noKartu'],
                            'noMr' => $data['peserta']['noMr'],
                            'nama' => $data['peserta']['nama'],
                            'poli' => $data['poli'],
                            'jnsPelayanan' => $data['jnsPelayanan']
                        ];
                        $this->cetak($printData);
                        return redirect()->route('pasien.verify');
                    } else {
                        $message = $response['metaData']['message'];
                        return redirect()->back()->with('error', $message);
                    }
                    // return view('pasien.cetak-sep', compact('rujukans'));
                } else {
                    $message = 'Rujukan tidak ditemukan';
                    return redirect()->back()->with('error', $message);
                }
            } else {
                $message = 'Rujukan tidak ditemukan';
                return redirect()->back()->with('error', $message);
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function byOldSepAndAddSuratKontrol(Request $request)
    {
        // CEK APAKAH SESSION MASIH AKTIF
        if ($request->session()->has('pasien')) {
            $nomorKartu = $request->session()->get('pasien')['no_identitas'];
            $kodeDokterRs = $request->session()->get('pasien')['kode_dokter_rs'];
        } else {
            return redirect()->back()->with('error', 'Sesi telah habis');
        }

        try {
            //CARI NO SEP BERDASARKAN POLI YANG SAMA DENGAN PENDAFTARAN ONLINE
            $sepHistories = $this->getHistoriSep($nomorKartu);

            // CEK APAKAH SEP ADA
            if ($sepHistories != null) {
                $oldSep = [];
                // GET 1 BARIS DARI BERDASARKAN KODE DOKTER YANG ADA DI RS
                $bridge = $this->findPoli($kodeDokterRs);
                $poliRs = $bridge['kode_poli'];

                foreach ($sepHistories as $sepHistory) {
                    $getPoliTujuan = $sepHistory['poliTujSep'];

                    // Bandingkan kode poli dengan kode yang ada di database
                    if ($getPoliTujuan == $poliRs) {
                        $oldSep = $sepHistory;
                    }
                }
                // AMBIL NO SEP
                $noSep = $oldSep['noSep'];

                // CEK APAKAH RENCANA KONTROL LEBIH BESAR DARI TANGGAL KONTROL
                $tglRencanaKontrolKronis = $this->findPesertaKronis($noSep);
                $validateRencanKontrol = date('Y-m-d');

                if ($tglRencanaKontrolKronis) {
                    if ($validateRencanKontrol < $tglRencanaKontrolKronis) {
                        $message = 'Tanggal Kontrol Harus Sesuai ' . $tglRencanaKontrolKronis . ' Harap Ke Pendaftaran';
                        return redirect()->back()->with('error', $message);
                    }
                }

                // INSERT RENCANA KONTROL BY NO SEP
                $requestData = [
                    'request' => [
                        'noSEP' => $noSep,
                        'kodeDokter' => $bridge['kode_dokter_bpjs'],
                        'poliKontrol' => $bridge['kode_poli'],
                        'tglRencanaKontrol' => date('Y-m-d'),
                        'user' => auth()->user()->name ?? 'admin'
                    ]
                ];

                $insert = json_encode($requestData, true);
                $insertRencanKontrol = $this->rencanaKontrolRepository->insert($insert);

                if ($insertRencanKontrol['metaData']['code'] == 200) {
                    $response = $insertRencanKontrol['response'];
                    // AMBIL NO RENCANA KONTROL UNTUK KEPERLUAN INSERT SEP
                    $noSurat = $response['noSuratKontrol'];

                    // CARI SURAT KONTROL BERDASARKAN NOMOR
                    $suratKontrol = $this->rencanaKontrolRepository->findByNomorSurat($noSurat);
                    if ($suratKontrol['metaData']['code'] == 200) {
                        $kodeDokter = $suratKontrol['response']['kodeDokter'];
                        $namaDokter = $suratKontrol['response']['namaDokter'];

                        // NO SEP UNTUK KEBUTUHAN FIND SEP 
                        $noSepBySuratKontrol = $suratKontrol['response']['sep']['noSep'];
                        $findOldSep = $this->sepRepository->findByNomor($noSepBySuratKontrol);

                        // FILTER POLI UNTUK KEBUTUHAN DIAGNOSA
                        if ($findOldSep['metaData']['code'] == 200) {
                            $dataSep = $findOldSep['response'];

                            // AMBIL RUJUKAN BUAT KEBUTUHAN ISI FORM SEP RUJUKAN
                            $noRujukan = $dataSep['noRujukan'];
                            $rujukan = $this->rujukanRepository->findByNoRujukan($noRujukan);

                            if ($rujukan['metaData']['code'] == 200) {
                                $dataRujukan = $rujukan['response']['rujukan'];

                                // PEMBERIAN DIAGNOSA UNTUK POLI
                                if ($bridge['kode_poli'] == 'MAT') {
                                    $diagnosa = 'H52.6';
                                } elseif ($bridge['kode_poli'] == 'ORT') {
                                    $diagnosa = 'Z47.9';
                                } else {
                                    $diagnosa = 'Z09.8';
                                }

                                $requestData = [
                                    'request' => [
                                        't_sep' => [
                                            "noKartu" => $dataSep['peserta']['noKartu'],
                                            "tglSep" => date('Y-m-d'),
                                            "ppkPelayanan" => "0107R006",
                                            "jnsPelayanan" => "2", //rawat jalan
                                            "klsRawat" => [
                                                "klsRawatHak" => $dataRujukan['peserta']['hakKelas']['kode'],
                                                "klsRawatNaik" => "",
                                                "pembiayaan" => "",
                                                "penanggungJawab" => "",
                                            ],
                                            "noMR" => $dataSep['peserta']['noMr'],
                                            "rujukan" => [
                                                "asalRujukan" => "1", //faskes 1
                                                "tglRujukan" => $dataRujukan['tglKunjungan'],
                                                "noRujukan" => $dataRujukan['noKunjungan'],
                                                "ppkRujukan" => $dataRujukan['provPerujuk']['kode']
                                            ],
                                            "catatan" => "",
                                            "diagAwal" => $diagnosa,
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
                                            "tujuanKunj" => "2",
                                            "flagProcedure" => "",
                                            "kdPenunjang" => "",
                                            "assesmentPel" => "5",
                                            "skdp" => [
                                                "noSurat" => $noSurat ?? '',
                                                "kodeDPJP" => $kodeDokter ?? ''
                                            ],
                                            "dpjpLayan" => $kodeDokter,
                                            "noTelp" => $dataRujukan['peserta']['mr']['noTelepon'] ?? '',
                                            "user" => auth()->user()->name ?? 'admin'
                                        ]
                                    ]
                                ];

                                $insertSep = json_encode($requestData, true);
                                $response =   $this->sepRepository->insert($insertSep);

                                if ($response['metaData']['code'] == 200) {
                                    $data = $response['response']['sep'];
                                    $printData = [
                                        'noSep' => $data['noSep'],
                                        'tglSep' => $data['tglSep'],
                                        'noKartu' => $data['peserta']['noKartu'],
                                        'noMr' => $data['peserta']['noMr'],
                                        'nama' => $data['peserta']['nama'],
                                        'poli' => $data['poli'],
                                        'jnsPelayanan' => $data['jnsPelayanan']
                                    ];
                                    $this->cetak($printData);
                                    return redirect()->route('pasien.verify')->with('success', 'SEP sukses');
                                } else {
                                    $message = $response['metaData']['message'];
                                    return redirect()->back()->with('error', $message);
                                }
                            } else {
                                return redirect()->back()->with('error', 'Rujukan failed');
                            }
                        }
                    } else {
                        return redirect()->back()->with('error', 'surat kontrol failed');
                    }
                    dd($suratKontrol);
                } else {
                    return redirect()->back()->with('error', $insertRencanKontrol['metaData']['message']);
                }
            } else {
                return redirect()->back()->with('error', 'No SEP Tidak Tersedia');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    private function findPoli($kodeDokterRs)
    {
        return BridgePoli::where('kode_dokter_rs', $kodeDokterRs)->first();
    }

    private function getHistoriSep($noKartu)
    {
        // ambil data history SEP 
        $currentDate = Carbon::now();
        // ubah menjadi tanggal format (YYYY-mm-dd)
        $endDate = $currentDate->toDateString();
        // ambil tanggal 90 hari dari tanggal sekarang
        $startDate = $currentDate->copy()->subDays(90)->toDateString();

        $result =  $this->sepRepository->history($noKartu,  $startDate, $endDate);

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

    public function cetak($printData)
    {


        $connector = new FilePrintConnector(config('app.printer_url'));
        $printer = new Printer($connector);

        $printer->setJustification(Printer::JUSTIFY_CENTER);

        $printer->setEmphasis();
        $printer->text("RSU MUHAMMADIYAH METRO\n");
        $printer->setEmphasis(false);

        $printer->setTextSize(1, 1);
        $printer->text("Jl. Soekarno Hatta No.42 Mulyojati 16B \n Metro Barat Kota Metro\n\n");


        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->setTextSize(1, 1);
        $printer->text("No SEP : " . $printData['noSep'] . " \n");

        $printer->setTextSize(1, 1);
        $printer->text("No MR : " . $printData['noMr'] . " \n");

        $printer->setTextSize(1, 1);
        $printer->text("Nama : " . $printData['nama'] . " \n");

        $printer->setTextSize(1, 1);
        $printer->text("Poli Tujuan : " . $printData['poli'] . " \n");

        $printer->setTextSize(1, 1);
        $printer->text("Jenis Pelayanan : " . $printData['jnsPelayanan'] . " \n\n");

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(1, 1);
        $printer->setEmphasis();
        $printer->text("Telah Melakukan Finger dan Cetak SEP \n");
        $printer->setEmphasis(false);

        $printer->setTextSize(1, 1);
        $printer->text("Pada " . date('d-m-Y h:i:s') . "\n\n");
        $printer->setTextSize(1, 1);
        $printer->text("-------------------------------- \n\n\n");

        $printer->setJustification(Printer::JUSTIFY_LEFT);

        $printer->setTextSize(1, 1);
        $printer->text("Pelayanan Penunjang : \n\n\n");
        $printer->setTextSize(1, 1);
        $printer->text("Pelayanan Poli : \n\n\n");
        $printer->setTextSize(1, 1);
        $printer->text("Pelayanan Farmasi : \n\n\n");
        $printer->setTextSize(1, 1);
        $printer->text("Pelayanan Kasir : \n\n\n");

        $printer->feed(3);

        $printer->cut();
        return $printer->close();
        // return redirect()->back();
    }

    public function findPesertaKronis($noSep)
    {
        $pesertaKronis = RencanaKontrolKronis::where('no_sep', $noSep)->first();
        return $pesertaKronis->tgl_rencana_kontrol;
    }
}
