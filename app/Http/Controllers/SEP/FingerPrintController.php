<?php

namespace App\Http\Controllers\SEP;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;

class FingerPrintController extends Controller
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }


    public function index($tanggalPelayanan)
    {
        $endpoint = 'SEP/FingerPrint/List/Peserta/TglPelayanan/' . $tanggalPelayanan;
        return $this->bridging->getRequest($endpoint);
    }

    public function getNoKartu($noKartu, $tanggalPelayanan)
    {
        $endpoint = 'SEP/FingerPrint/Peserta/' . $noKartu . '/TglPelayanan/' . $tanggalPelayanan;
        return $this->bridging->getRequest($endpoint);
    }
}
