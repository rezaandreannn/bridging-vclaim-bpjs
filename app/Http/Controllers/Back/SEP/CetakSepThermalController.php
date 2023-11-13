<?php

namespace App\Http\Controllers\Back\SEP;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Repositories\RencanaKontrolRepository;

class CetakSepThermalController extends Controller
{
    protected $rencanaKontrolRepository;
    protected $sepRepository;

    public function __construct(SepRepository $sepRepository, RencanaKontrolRepository $rencanaKontrolRepository)
    {
        $this->sepRepository = $sepRepository;
        $this->rencanaKontrolRepository = $rencanaKontrolRepository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $noSep)
    {
        $data = $this->sepRepository->findByNomor($noSep);
        // $sepRencanaKontrol = $this->rencanaKontrolRepository->findSep($noSep);

        $sep = [];
        if ($data['metaData']['code'] == 200) {
            $sep = $data['response'];
        }
        
        return view('sep.cetak-sep-termal', compact('sep'));
    }
}
