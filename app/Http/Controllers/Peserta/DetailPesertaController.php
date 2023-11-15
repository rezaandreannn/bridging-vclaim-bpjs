<?php

namespace App\Http\Controllers\Peserta;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Repositories\PesertaRepository;
use App\Repositories\RujukanRepository;
use App\Repositories\FingerPrintRepository;
use App\Repositories\RencanaKontrolRepository;

class DetailPesertaController extends Controller
{

    protected $rujukanRepository;
    protected $sepRepository;
    protected $fingerPrintRepository;
    protected $rencanaKontrolRepository;
    protected $pesertaRepository;

    public function __construct(RujukanRepository $rujukanRepository, SepRepository $sepRepository, FingerPrintRepository $fingerPrintRepository, RencanaKontrolRepository $rencanaKontrolRepository, PesertaRepository $pesertaRepository)
    {
        $this->rujukanRepository = $rujukanRepository;
        $this->sepRepository = $sepRepository;
        $this->fingerPrintRepository = $fingerPrintRepository;
        $this->rencanaKontrolRepository = $rencanaKontrolRepository;
        $this->pesertaRepository = $pesertaRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $noKartu)
    {
        try {
            // HISTORIES SEP PESERTA
            $currentDate = Carbon::now();
            // ubah menjadi tanggal format (YYYY-mm-dd)
            $endDate = $currentDate->toDateString();
            // ambil tanggal 90 hari dari tanggal sekarang
            $startDate = $currentDate->copy()->subDays(90)->toDateString();

            $dataHistories = $this->sepRepository->history($noKartu, $startDate, $endDate);
            if ($dataHistories['metaData']['code'] == 200) {
                $histories = $dataHistories['response']['histori'];
            } else {
                $histories = [];
            }

            // RUJUKAN PESERTA
            $response = $this->rujukanRepository->getByNomorKartu($noKartu);
            $rujukans = [];

            if ($response['metaData']['code'] == 200) {
                $dataRujukan = $response['response']['rujukan'];
                foreach ($dataRujukan as $rujukan) {
                    $tglKunjungan = Carbon::parse($rujukan['tglKunjungan']);
                    $expirationDate = $tglKunjungan->copy()->addDays(90);

                    $currentDate = Carbon::now();
                    $ninetyDaysAgo = $currentDate->subDays(90);  // Change this line

                    if ($tglKunjungan->gt($ninetyDaysAgo)) {
                        $rujukan['expiredDate'] = $expirationDate->toDateString();
                        $rujukans[] = $rujukan;
                    }
                }
            }


            // RENCANA KONTROL

            $tahun = date('Y');
            $bulanNow = date('m');
            $response = $this->rencanaKontrolRepository->getByNomorKartu($bulanNow, $tahun, $noKartu);


            if ($response['metaData']['code'] == 200) {
                $suratKontrols = $response['response']['list'];
            } else {
                $suratKontrols = [];
            }



            $dataPeserta = $this->pesertaRepository->byNomor($noKartu);
            if ($dataPeserta['metaData']['code'] == 200) {
                $peserta = $dataPeserta['response']['peserta'];
            } else {
                $peserta = [];
            }
        } catch (\Throwable $th) {
            return \redirect()->back()->with('warning', $th->getMessage());
        }


        return view('peserta-detail', compact('histories', 'rujukans', 'suratKontrols', 'peserta'));
    }
}
