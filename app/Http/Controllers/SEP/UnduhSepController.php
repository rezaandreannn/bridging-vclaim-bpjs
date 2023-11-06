<?php

namespace App\Http\Controllers\SEP;

use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\SepRepository;
use App\Http\Controllers\Controller;
use App\Repositories\RencanaKontrolRepository;

class UnduhSepController extends Controller
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
        try {
            $data = $this->sepRepository->findByNomor($noSep);
            $sepRencanaKontrol = $this->rencanaKontrolRepository->findSep($noSep);
    
    
            if ($data['metaData']['code']) {
                $sep = $data['response'];
                $sepRen = $sepRencanaKontrol['response'];
                $diagnosa = Str::limit($sepRen['diagnosa'], 30, '');
            }

            $namaFile = $sep['tglSep'] .'_'. $sep['peserta']['nama'];

            return view('sep.unduh',  ['sep' => $sep, 'sepRen' => $sepRen, 'diagnosa' => $diagnosa, 'namaFile' => $namaFile]);
           
            // $pdf = PDF::loadview('sep.unduh', ['sep' => $sep, 'sepRen' => $sepRen, 'diagnosa' => $diagnosa]);

            // return $pdf->download('sep.pdf');
          
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning', $th->getMessage());
        }
        
    }
}
