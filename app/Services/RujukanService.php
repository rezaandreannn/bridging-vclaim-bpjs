<?php

namespace App\Services;

use Carbon\Carbon;
use App\Repositories\RujukanRepository;

class RujukanService
{
    protected $rujukanRepository;

    public function __construct(RujukanRepository $rujukanRepository)
    {
        $this->rujukanRepository = $rujukanRepository;
    }
    public function rujukanStatusAktif($noKartu)
    {
        // RUJUKAN PESERTA
        $response = $this->rujukanRepository->getByNomorKartu($noKartu);
        $rujukans = [];

        if ($response['metaData']['code'] == 200) {
            $dataRujukan = $response['response']['rujukan'];
            foreach ($dataRujukan as $rujukan) {
                $tglKunjungan = Carbon::parse($rujukan['tglKunjungan']);
                $currentDate = Carbon::now();
                $threeMonthsAgo = $currentDate->subMonths(3);

                if ($tglKunjungan->gt($threeMonthsAgo)) {
                    $rujukans[] = $rujukan;
                }
            }
        }

        return $rujukans;
    }
}
