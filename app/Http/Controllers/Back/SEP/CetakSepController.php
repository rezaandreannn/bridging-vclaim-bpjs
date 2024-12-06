<?php

namespace App\Http\Controllers\Back\SEP;

use PDF;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Repositories\RencanaKontrolRepository;

class CetakSepController extends Controller
{
    protected $sepRepository;
    protected $rencanaKontrolRepository;

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
        $sepRencanaKontrol = $this->rencanaKontrolRepository->findSep($noSep);


        if ($data['metaData']['code']) {
            $sep = $data['response'];
            $sepRen = $sepRencanaKontrol['response'];
            $diagnosa = Str::limit($sepRen['diagnosa'], 30, '');
        }

        return view('sep.cetak-sep', compact('sep', 'sepRen', 'diagnosa'));
    }
}
