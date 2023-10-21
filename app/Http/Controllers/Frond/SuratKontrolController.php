<?php

namespace App\Http\Controllers\Frond;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RujukanRepository;
use App\Repositories\FingerPrintRepository;
use App\Repositories\RencanaKontrolRepository;

class SuratKontrolController extends Controller
{
    protected $rujukan;
    protected $finger;
    protected $rencanaKontrol;

    public function __construct(RujukanRepository $rujukan, FingerPrintRepository $finger, RencanaKontrolRepository $rencanaKontrol)
    {
        $this->rujukan = $rujukan;
        $this->finger = $finger;
        $this->rencanaKontrol = $rencanaKontrol;
    }

    public function index($nomorKartu)
    {

        // $rencana = $this->rencanaKontrol->findByNomorKartu($nomorKartu);
        // dd($rencana);

        $rujukan = $this->rujukan->getByNomorKartu($nomorKartu);
        $dataRujukan = $rujukan['response']['rujukan'];

        $filteredRujukan = [];
        foreach ($dataRujukan as $rujukan) {
            $tglKunjungan = Carbon::parse($rujukan['tglKunjungan']);
            $currentDate = Carbon::now();
            $threeMonthsAgo = $currentDate->subMonths(3);

            if ($tglKunjungan->gt($threeMonthsAgo)) {
                $filteredRujukan[] = $rujukan;
            }
        }
        // dd($filteredRujukan);

        // dd($dataRujukan);
        return view('frond.rujukan.list', compact('filteredRujukan'));
    }
}
