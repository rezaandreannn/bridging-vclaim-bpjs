<?php

namespace App\Http\Controllers\Back\SEP;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Repositories\PesertaRepository;
use App\Repositories\RujukanRepository;

class CreateSepController extends Controller
{
    protected $sepRepository;
    protected $rujukanRepository;
    protected $pesertaRepository;

    public function __construct(SepRepository $sepRepository, RujukanRepository $rujukanRepository, PesertaRepository $pesertaRepository)
    {
        $this->sepRepository = $sepRepository;
        $this->rujukanRepository = $rujukanRepository;
        $this->pesertaRepository = $pesertaRepository;
    }
    public function create($noKartu = null)
    {
        if ($noKartu == null) {
            return redirect()->back()->with('error', 'No Kartu Tidak Boleh Kosong');
        }
        // AMBIL PESERTA BERDAASARKAN NOMOR
        $dataPeserta = $this->pesertaRepository->byNomor($noKartu);
        if ($dataPeserta['metaData']['code'] == 200) {
            $peserta = $dataPeserta['response']['peserta'];
        } else {
            $peserta = [];
        }

        // AMBIL RUJUKAN BERDASARKAN NO KARTU
        // RUJUKAN PESERTA
        $rujukan = $this->rujukanRepository->getByNomorKartu($noKartu);
        $rujukans = [];

        if ($rujukan['metaData']['code'] == 200) {
            $dataRujukan = $rujukan['response']['rujukan'];
            foreach ($dataRujukan as $rujukan) {
                $tglKunjungan = Carbon::parse($rujukan['tglKunjungan']);
                $currentDate = Carbon::now();
                $threeMonthsAgo = $currentDate->subMonths(3);

                if ($tglKunjungan->gt($threeMonthsAgo)) {
                    $rujukans[] = $rujukan;
                }
            }
        }
        dd($rujukans);

        return view('sep.create', compact('peserta'));
    }

    public function store()
    {
    }
}
