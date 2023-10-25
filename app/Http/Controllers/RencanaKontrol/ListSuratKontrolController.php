<?php

namespace App\Http\Controllers\RencanaKontrol;

use App\Http\Controllers\Controller;
use App\Repositories\RencanaKontrolRepository;
use Illuminate\Http\Request;

class ListSuratKontrolController extends Controller
{

    protected $rencanaKontrolRepository;

    public function __construct(RencanaKontrolRepository $rencanaKontrolRepository)
    {
        $this->rencanaKontrolRepository = $rencanaKontrolRepository;
    }

    public function list(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = date('Y');
        $noKartu = $request->session()->get('identitas');

        if ($bulan) {
            $response = $this->rencanaKontrolRepository->getByNomorKartu($bulan, $tahun, $noKartu);
        } else {
            $bulanNow = date('m');
            $response = $this->rencanaKontrolRepository->getByNomorKartu($bulanNow, $tahun, $noKartu);
        }

        $suratKontrols = [];
        if ($response['metaData']['code'] == 200) {
            $suratKontrols = $response['response']['list'];
        }

        // dd($suratKontrols);

        return view('rencana-kontrol.list-surat-kontrol', compact('suratKontrols'));
    }
}
