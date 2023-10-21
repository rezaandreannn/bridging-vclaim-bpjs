<?php

namespace App\Http\Controllers\SEP;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;

class HistoyController extends Controller
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeVclaim();
    }



    public function index($noKartu)
    {

        $endpoint = 'monitoring/HistoriPelayanan/NoKartu/' . $noKartu . '/tglMulai/2023-08-21/tglAkhir/2023-10-21';
        $data = $this->bridging->getRequest($endpoint);
        $result = json_decode($data, true);
        dd($result);
    }
}
