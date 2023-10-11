<?php

namespace App\Http\Controllers\SEP;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;
use App\Repositories\FingerPrintRepository;


class FingerPrintController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var FingerPrintRepository
     */
    protected $fingerPrint;

    /**
     * Create a new controller instance.
     *
     * @param  FingerPrintRepository  $fingerPrint
     * @return void
     */
    public function __construct(FingerPrintRepository $fingerPrint)
    {
        $this->fingerPrint = $fingerPrint;
    }

    /**
     * Show data finger print.
     *
     * @param  string  $tanggalPelayanan
     * @return 
     */
    public function index($tanggalPelayanan)
    {
        $data = $this->fingerPrint->byTanggal($tanggalPelayanan);
        if ($data['metaData']['code'] == 200) {
            return $data['response']['list'];
        } else {
            return $data;
        }
        // $endpoint = 'SEP/FingerPrint/List/Peserta/TglPelayanan/' . $tanggalPelayanan;
        // return $this->bridging->getRequest($endpoint);
    }

    public function getNoKartu($noKartu, $tanggalPelayanan)
    {
        return $this->fingerPrint->byNoKartuAndTanggal($noKartu, $tanggalPelayanan);
        // $endpoint = 'SEP/FingerPrint/Peserta/' . $noKartu . '/TglPelayanan/' . $tanggalPelayanan;
        // return $this->bridging->getRequest($endpoint);
    }
}
