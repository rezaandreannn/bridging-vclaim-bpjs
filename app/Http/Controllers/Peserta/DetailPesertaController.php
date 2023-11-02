<?php

namespace App\Http\Controllers\Peserta;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Repositories\RujukanRepository;
use App\Repositories\FingerPrintRepository;
use App\Repositories\RencanaKontrolRepository;

class DetailPesertaController extends Controller
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

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $noKartu)
    {
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
        $dataRujukan = $response['response']['rujukan'];

        $rujukans = [];
        foreach ($dataRujukan as $rujukan) {
            $tglKunjungan = Carbon::parse($rujukan['tglKunjungan']);
            $currentDate = Carbon::now();
            $threeMonthsAgo = $currentDate->subMonths(3);

            if ($tglKunjungan->gt($threeMonthsAgo)) {
                $rujukans[] = $rujukan;
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

        // dd($suratKontrols);


        return view('peserta-detail', compact('histories', 'rujukans', 'suratKontrols'));
    }
}
