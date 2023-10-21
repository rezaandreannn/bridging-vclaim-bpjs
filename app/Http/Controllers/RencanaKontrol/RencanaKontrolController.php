<?php

namespace App\Http\Controllers\RencanaKontrol;

use App\Http\Controllers\Controller;
use Bpjs\Bridging\Vclaim\BridgeVclaim;
use Illuminate\Http\Request;

class RencanaKontrolController extends Controller
{
    protected $rencanaKontrol;

    public function __construct()
    {
        $this->rencanaKontrol = new BridgeVclaim();
    }

    public function index()
    {

        $endpoint = 'RencanaKontrol/ListRencanaKontrol/Bulan/10/Tahun/2023/NoKartu/0000034735476/filter/1';
        $result = $this->rencanaKontrol->getRequest($endpoint);
        return json_decode($result, true);
    }
}
