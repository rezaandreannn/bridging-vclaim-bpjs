<?php

namespace App\Http\Controllers\Peserta;

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
    public function __invoke(Request $request)
    {
        return view('peserta.detail');
    }
}
